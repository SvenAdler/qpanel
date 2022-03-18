<?php

namespace app\controller;

use app\model\SetModel;
use app\system\Base;
use JsonException;

class SetController extends Base
{
    private SetModel $model;

    public function __construct()
    {
        $this->model = new SetModel();
    }

    public function getAll(): array|bool
    {
        return ($this->model)->getAll();
    }

    public function getCurrentSetByID($id): bool|\stdClass
    {
        return ($this->model)->get($id);
    }

    // Used in getAllSetTitles.php
    public function getAllTitles(): array
    {
        return ($this->model)->getAllTitles();
    }

    public function addSet()
    {
        if (isset($_POST['set_ordering'], $_POST['set_title']) &&
            !empty($_POST['set_ordering']) && !empty($_POST['set_title'])) {
            $ordering = (int)$_POST['set_ordering'];
            $title = $_POST['set_title'];
            $set_id = $this->model->add($ordering, $title);
            if (!headers_sent()) {
                $this->setSession('set_id', $set_id);
                header('HTTP/1.1 301 Found');
                header('Location: ' . '/');
            } else {
                print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
            }
        }
    }

    public function removeSet()
    {
        $rm_id = isset($_GET['removeSet']) ? (int)$_GET['removeSet'] : null;
        if (is_null($rm_id)) {
            return null;
        }
        $this->model->remove($rm_id);
        if (!headers_sent()) {
            $_SESSION = [];
            header('HTTP/1.1 301 Found');
            header('Location: ' . '/');
        } else {
            print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
        }
    }

    public function editSet()
    {
        if (isset($_POST['ed_id'], $_POST['ed_ordering'], $_POST['ed_title']) &&
            !empty($_POST['ed_id']) && !empty($_POST['ed_ordering']) && !empty($_POST['ed_title'])) {
            $this->model->edit((int)$_POST['ed_id'], (int)$_POST['ed_ordering'], $_POST['ed_title']);
        }
    }

    /**
     * @throws JsonException
     */
    public function outputJSON()
    {
        $id = isset($_GET['set_id']) ? (int)$_GET['set_id'] : null;
        if (is_null($id)) {
            return null;
        }
        return json_encode($this->model->getOutputData($id), JSON_THROW_ON_ERROR | JSON_HEX_APOS);
    }
}