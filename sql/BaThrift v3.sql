CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `role` ENUM ('admin', 'buyer', 'seller') NOT NULL DEFAULT 'buyer',
  `status` ENUM ('active', 'suspended') NOT NULL DEFAULT 'active',
  `suspend_reason` text COMMENT 'Required when status = suspended (validated in PHP)',
  `name` varchar(100) NOT NULL,
  `username` varchar(100),
  `email` varchar(100) UNIQUE NOT NULL,
  `password` varchar(255) NOT NULL COMMENT 'Hashed (password_hash)',
  `phone` varchar(20),
  `bio` TEXT,
  `photo` varchar(255),
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `stores` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int UNIQUE NOT NULL COMMENT '1 user = maksimal 1 toko. Harus user dengan role = seller (validated in PHP)',
  `name` varchar(100) UNIQUE NOT NULL,
  `description` text,
  `logo` varchar(255),
  `status` ENUM ('active', 'suspended') NOT NULL DEFAULT 'active',
  `suspend_reason` text COMMENT 'Required when status = suspended (validated in PHP)',
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `addresses` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `label` varchar(50) COMMENT 'e.g. Home, Boarding house, Office',
  `recipient_name` varchar(100) NOT NULL,
  `recipient_phone` varchar(20) NOT NULL,
  `full_address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(10),
  `is_primary` boolean DEFAULT false
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) UNIQUE NOT NULL,
  `description` text,
  `is_active` boolean NOT NULL DEFAULT true COMMENT 'Used categories cannot be deleted, only deactivated',
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `store_id` int NOT NULL COMMENT 'Toko pemilik item',
  `category_id` int NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text,
  `price` decimal(12,2) NOT NULL,
  `size` ENUM ('XS', 'S', 'M', 'L', 'XL', 'XXL', 'all_size', 'other') NOT NULL,
  `item_condition` ENUM ('like_new', 'good', 'has_defects') NOT NULL,
  `defect_notes` text COMMENT 'Required when item_condition = has_defects (validated in PHP)',
  `main_photo` varchar(255) NOT NULL,
  `status` ENUM ('available', 'reserved', 'sold', 'taken_down') NOT NULL DEFAULT 'available',
  `moderation_note` text COMMENT 'Reason given by admin when status = taken_down',
  `moderated_by` int COMMENT 'Admin who took the item down',
  `moderated_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `item_photos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `photo_file` varchar(255) NOT NULL,
  `sort_order` int DEFAULT 0
);

CREATE TABLE `cart_items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL COMMENT 'Cart owner (buyer or seller). Admin has no cart',
  `item_id` int NOT NULL,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_code` varchar(30) UNIQUE NOT NULL COMMENT 'e.g. BT-20261112-001',
  `buyer_id` int NOT NULL,
  `store_id` int NOT NULL COMMENT 'Toko penjual. Satu order = satu toko',
  `recipient_name` varchar(100) NOT NULL,
  `recipient_phone` varchar(20) NOT NULL,
  `shipping_address` text NOT NULL COMMENT 'Address snapshot taken at checkout',
  `total_price` decimal(12,2) NOT NULL,
  `status` ENUM ('awaiting_payment', 'processing', 'shipped', 'delivered', 'completed', 'disputed', 'cancelled') NOT NULL DEFAULT 'awaiting_payment',
  `payment_deadline` timestamp NOT NULL COMMENT 'created_at + 24 jam. Lewat deadline & belum verified -> auto cancel, item kembali available',
  `tracking_number` varchar(50),
  `shipped_at` timestamp,
  `delivered_at` timestamp COMMENT 'Saat buyer konfirmasi barang diterima',
  `completed_at` timestamp,
  `completed_by` int COMMENT 'Admin yang menyetujui penyelesaian order',
  `dispute_reason` text COMMENT 'Required when status = disputed',
  `cancelled_by` ENUM ('buyer', 'seller', 'admin') COMMENT 'Only filled when status = cancelled',
  `cancel_reason` text COMMENT 'Required when cancelled by admin',
  `notes` text,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP),
  `updated_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `order_items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `item_name` varchar(150) NOT NULL COMMENT 'Name snapshot at checkout',
  `price` decimal(12,2) NOT NULL COMMENT 'Price snapshot at checkout'
);

CREATE TABLE `payments` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `amount` decimal(12,2) NOT NULL COMMENT 'Nominal yang ditransfer buyer. Harus = orders.total_price saat diverifikasi',
  `sender_bank` varchar(50) NOT NULL,
  `sender_account_name` varchar(100) NOT NULL,
  `proof_photo` varchar(255) NOT NULL COMMENT 'Foto/screenshot bukti transfer',
  `transferred_at` timestamp COMMENT 'Waktu transfer menurut buyer',
  `status` ENUM ('waiting_verification', 'verified', 'rejected') NOT NULL DEFAULT 'waiting_verification',
  `admin_note` text COMMENT 'Alasan jika rejected',
  `verified_by` int,
  `verified_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `refunds` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `order_id` int UNIQUE NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `reason` text NOT NULL COMMENT 'Cancel setelah bayar, atau komplain dimenangkan buyer',
  `bank_name` varchar(50) NOT NULL COMMENT 'Rekening buyer tujuan refund',
  `account_number` varchar(50) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `status` ENUM ('pending', 'transferred') NOT NULL DEFAULT 'pending',
  `handled_by` int,
  `handled_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `balance_transactions` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `store_id` int NOT NULL COMMENT 'Toko pemilik saldo',
  `order_id` int COMMENT 'Terisi untuk type sale / refund',
  `withdrawal_id` int COMMENT 'Terisi untuk type withdrawal / withdrawal_reversal',
  `type` ENUM ('sale', 'refund', 'withdrawal', 'withdrawal_reversal', 'adjustment') NOT NULL,
  `amount` decimal(12,2) NOT NULL COMMENT 'Positif = saldo masuk, negatif = saldo keluar',
  `description` text,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `withdrawal_requests` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `store_id` int NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `status` ENUM ('pending', 'approved', 'transferred', 'rejected') NOT NULL DEFAULT 'pending',
  `admin_note` text COMMENT 'Alasan jika rejected',
  `handled_by` int COMMENT 'Admin yang memproses',
  `handled_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `item_reports` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `reporter_id` int NOT NULL COMMENT 'Buyer or seller who reported the item',
  `reason` text NOT NULL,
  `status` ENUM ('pending', 'actioned', 'dismissed') NOT NULL DEFAULT 'pending',
  `admin_note` text,
  `handled_by` int COMMENT 'Admin who reviewed the report',
  `handled_at` timestamp,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `activity_logs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `action` varchar(50) NOT NULL COMMENT 'e.g. suspend_user, suspend_store, takedown_item, restore_item, create_category, force_cancel_order, approve_withdrawal',
  `target_type` ENUM ('user', 'store', 'item', 'category', 'order', 'report', 'withdrawal', 'payment', 'refund') NOT NULL,
  `target_id` int NOT NULL,
  `description` text,
  `created_at` timestamp DEFAULT (CURRENT_TIMESTAMP)
);

CREATE INDEX `users_index_0` ON `users` (`role`);

CREATE INDEX `users_index_1` ON `users` (`status`);

CREATE INDEX `stores_index_2` ON `stores` (`status`);

CREATE INDEX `items_index_3` ON `items` (`store_id`);

CREATE INDEX `items_index_4` ON `items` (`name`);

CREATE INDEX `items_index_5` ON `items` (`category_id`, `size`, `item_condition`);

CREATE INDEX `items_index_6` ON `items` (`status`);

CREATE UNIQUE INDEX `cart_items_index_7` ON `cart_items` (`user_id`, `item_id`);

CREATE INDEX `orders_index_8` ON `orders` (`buyer_id`);

CREATE INDEX `orders_index_9` ON `orders` (`store_id`);

CREATE INDEX `orders_index_10` ON `orders` (`status`);

CREATE INDEX `orders_index_11` ON `orders` (`created_at`);

CREATE UNIQUE INDEX `order_items_index_12` ON `order_items` (`order_id`, `item_id`);

CREATE INDEX `payments_index_13` ON `payments` (`order_id`);

CREATE INDEX `payments_index_14` ON `payments` (`status`);

CREATE INDEX `balance_transactions_index_15` ON `balance_transactions` (`store_id`, `created_at`);

CREATE UNIQUE INDEX `balance_transactions_index_16` ON `balance_transactions` (`order_id`, `type`);

CREATE INDEX `balance_transactions_index_17` ON `balance_transactions` (`withdrawal_id`);

CREATE INDEX `withdrawal_requests_index_18` ON `withdrawal_requests` (`store_id`);

CREATE INDEX `withdrawal_requests_index_19` ON `withdrawal_requests` (`status`);

CREATE INDEX `item_reports_index_20` ON `item_reports` (`status`);

CREATE UNIQUE INDEX `item_reports_index_21` ON `item_reports` (`item_id`, `reporter_id`);

CREATE INDEX `activity_logs_index_22` ON `activity_logs` (`admin_id`);

CREATE INDEX `activity_logs_index_23` ON `activity_logs` (`target_type`, `target_id`);

CREATE INDEX `activity_logs_index_24` ON `activity_logs` (`created_at`);

ALTER TABLE `users` COMMENT = 'All accounts (admin, buyer, seller). Data toko dipindah ke tabel stores. Admin accounts come from seed only';

ALTER TABLE `stores` COMMENT = 'Toko milik seller. Dibuat saat buyer membuka toko (role berubah jadi seller). Pemilik item, order, dan saldo.';

ALTER TABLE `addresses` COMMENT = 'Shipping addresses owned by a buyer or seller';

ALTER TABLE `categories` COMMENT = 'Item categories. Initial data from seed, then managed (CRUD) by admin';

ALTER TABLE `items` COMMENT = 'Unique thrift item, quantity of one, owned by exactly one store';

ALTER TABLE `item_photos` COMMENT = 'Additional gallery photos for the item detail page (optional)';

ALTER TABLE `cart_items` COMMENT = 'No quantity column since every item is unique. Own items (items.store_id -> stores.user_id = user_id) are rejected in PHP. Rows are removed when an item is taken down';

ALTER TABLE `orders` COMMENT = 'Order header. Each order contains items from a single store only. Admin can monitor all orders and force-cancel';

ALTER TABLE `order_items` COMMENT = 'Order line items, no quantity since every item is unique';

ALTER TABLE `payments` COMMENT = 'Bukti pembayaran buyer ke rekening admin. Satu order boleh punya beberapa baris (upload ulang setelah rejected). Hanya satu yang boleh verified (validated in PHP). Rekening tujuan admin disimpan di config PHP.';

ALTER TABLE `refunds` COMMENT = 'Pengembalian dana ke buyer dari rekening admin. Hanya untuk order yang payment-nya sudah verified lalu cancelled/disputed. Tidak menyentuh ledger seller karena saldo seller belum pernah dikreditkan.';

ALTER TABLE `balance_transactions` COMMENT = 'Ledger saldo toko, append-only (tidak di-UPDATE/DELETE). Saldo = SUM(amount) per store_id. Insert harus dalam 1 transaksi DB bersama perubahan statusnya.';

ALTER TABLE `withdrawal_requests` COMMENT = 'Permintaan tarik saldo oleh seller. Saat dibuat, PHP insert baris withdrawal (negatif) ke balance_transactions. Jika rejected, insert withdrawal_reversal. Validasi di PHP: amount <= saldo saat ini (cek dengan SELECT ... FOR UPDATE).';

ALTER TABLE `item_reports` COMMENT = 'Reports of suspicious or rule-breaking items, reviewed by admin';

ALTER TABLE `activity_logs` COMMENT = 'Audit trail of admin actions';

ALTER TABLE `stores` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `addresses` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `items` ADD FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

ALTER TABLE `items` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT;

ALTER TABLE `items` ADD FOREIGN KEY (`moderated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `item_photos` ADD FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

ALTER TABLE `cart_items` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `cart_items` ADD FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

ALTER TABLE `orders` ADD FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT;

ALTER TABLE `orders` ADD FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

ALTER TABLE `order_items` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

ALTER TABLE `order_items` ADD FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE RESTRICT;

ALTER TABLE `orders` ADD FOREIGN KEY (`completed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `payments` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT;

ALTER TABLE `payments` ADD FOREIGN KEY (`verified_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `refunds` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT;

ALTER TABLE `refunds` ADD FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `balance_transactions` ADD FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

ALTER TABLE `balance_transactions` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT;

ALTER TABLE `balance_transactions` ADD FOREIGN KEY (`withdrawal_id`) REFERENCES `withdrawal_requests` (`id`) ON DELETE RESTRICT;

ALTER TABLE `withdrawal_requests` ADD FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE RESTRICT;

ALTER TABLE `withdrawal_requests` ADD FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `item_reports` ADD FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

ALTER TABLE `item_reports` ADD FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `item_reports` ADD FOREIGN KEY (`handled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

ALTER TABLE `activity_logs` ADD FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT;
