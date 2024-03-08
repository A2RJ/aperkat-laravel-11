<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// SQLSTATE[HY000]: General error: 1273 Unknown collation: 'utf8mb4_0900_ai_ci' (Connection: mysql, SQL: select table_name as `name`, (data_length + index_length) as `size`, table_comment as `comment`, engine as `engine`, table_collation as `collation` from information_schema.tables where table_schema = 'aperkat2' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED') order by table_name)

// SQLSTATE[HY000]: General error: 1273 Unknown collation: 'utf8mb4_0900_ai_ci' (Connection: mysql, SQL: select table_name as `name`, (data_length + index_length) as `size`, table_comment as `comment`, engine as `engine`, table_collation as `collation` from information_schema.tables where table_schema = 'aperkat2' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED') order by table_name)
