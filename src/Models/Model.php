<?php
abstract class Model {
    abstract public function create();
    abstract public function update();
    abstract public function read();
    abstract public function delete();
    abstract public function getAll();
}