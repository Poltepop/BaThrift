<?php

function Render(string $path, array $model = []): void{
    require_once __DIR__ . '/../View/' . $path . '.php';
}