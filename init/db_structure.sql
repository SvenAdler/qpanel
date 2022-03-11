CREATE TABLE `q_set` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ordering` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
); 

CREATE TABLE `topic` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `q_set_id` int(11) UNSIGNED NOT NULL,
  `ordering` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  FOREIGN KEY (q_set_id) REFERENCES q_set(id)
);

CREATE TABLE `question` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) UNSIGNED NOT NULL,
  `ordering` int(11) UNSIGNED NOT NULL,
  `question_type` enum('content','singlechoice','numeric','multiplechoice','topic_eval','set_eval') NOT NULL DEFAULT 'content',
  `question_text` text NULL,
  `goto_default` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (topic_id) REFERENCES topic(id),
  FOREIGN KEY (goto_default) REFERENCES question(id)
);

CREATE TABLE `possible_answer` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(11) UNSIGNED NOT NULL,
  `ordering` int(11) UNSIGNED NOT NULL,
  `answer_text` varchar(255) NOT NULL DEFAULT '',
  `min_points` int(11) UNSIGNED NOT NULL DEFAULT '1',
  `max_points` int(11) UNSIGNED NOT NULL DEFAULT '10',
  `goto` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (question_id) REFERENCES question(id),
  FOREIGN KEY (goto) REFERENCES question(id)
); 





