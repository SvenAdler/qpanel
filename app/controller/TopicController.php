<?php

namespace app\controller;

use app\model\TopicModel;
use app\system\Base;

class TopicController extends Base
{
    private TopicModel $model;

    public function __construct()
    {
        $this->model = new TopicModel();
    }

    public function getTopic($id)
    {
        return ($this->model)->get($id);
    }

    // used in panel.php to show topic table
    public function getTopicsBySetID($set_id): array
    {
        return ($this->model)->getBy($set_id);
    }

    // For Questions!
    public function getTopicTitlesBySetID($set_id): array
    {
        return ($this->model)->getTitlesBy($set_id);
    }

    public function addTopic()
    {
        if ((isset($_POST['topic_rel_set']) && isset($_POST['topic_ordering']) && isset($_POST['topic_title'])) &&
            (!empty($_POST['topic_rel_set']) && !empty($_POST['topic_ordering']) && !empty($_POST['topic_title']))) {
            $relatedSet = (int)$_POST['topic_rel_set'];
            $ordering = (int)$_POST['topic_ordering'];
            $title = $_POST['topic_title'];
            $this->model->add($relatedSet, $ordering, $title);
            if (!headers_sent()) {
                header('HTTP/1.1 301 Found');
                header('Location: ' . '/');
            } else {
                print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
            }
        }
    }

    public function removeTopic()
    {
        $rm_id = isset($_GET['removeTopic']) ? (int)$_GET['removeTopic'] : null;
        if (is_null($rm_id)) {
            return null;
        }
        $this->model->remove($rm_id);
        if (!headers_sent()) {
            header('HTTP/1.1 301 Found');
            header('Location: ' . '/');
        } else {
            print "<script>window.location.href = '" . htmlentities("/") . "';</script>";
        }
    }

    public function editTopic()
    {
        if ((isset($_POST['ed_topic_id']) && isset($_POST['ed_topic_relset']) && isset($_POST['ed_topic_ordering']) && isset($_POST['ed_topic_title'])) &&
            (!empty($_POST['ed_topic_id']) && !empty($_POST['ed_topic_relset']) && !empty($_POST['ed_topic_ordering']) && !empty($_POST['ed_topic_title']))) {
            $this->model->edit((int)$_POST['ed_topic_id'], (int)$_POST['ed_topic_relset'], (int)$_POST['ed_topic_ordering'], $_POST['ed_topic_title']);
        }
    }
}