<?php
    trait ViewPage {
        public function view(): void {
            require_once __DIR__ . '/../../view/pages/' . lcfirst(__CLASS__) . '.php';
        }
    }