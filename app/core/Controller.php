<?php

class Controller {
    public function __construct() {
        // Pemrosesan semua file di dalam folder app/controller
        $this->processControllers();
    }

    private function processControllers() {
        // Path ke folder controller
        $controllerFolder = 'app/controller/';

        // Mendapatkan semua file di dalam folder controller
        $controllerFiles = glob($controllerFolder . '*.php');

        // Memproses setiap file controller
        foreach ($controllerFiles as $file) {
            // Melakukan include file controller
            require_once $file;
        }
    }
}
