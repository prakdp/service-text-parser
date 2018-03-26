<?php

use App\Job;

require __DIR__.'/vendor/autoload.php';

$content = trim(file_get_contents("php://input"));

$result = [];

try {
	if (empty($content)) {
		throw new Exception("Body must not be empty");
	}

	$input = json_decode($content);

	if ($input === null) {
		throw new Exception("Body must not be valid json");
	}

	if (
		!isset($input->job)
		|| !isset($input->job->text)
		|| !isset($input->job->methods)
		|| !is_string($input->job->text)
		|| !is_array($input->job->methods)
	) {
		throw new Exception("Invalid message format");
	}

	$job = new Job($input->job->text, $input->job->methods);

	$result['text'] = $job->parse();
} catch (Exception $ex) {
	$result['error'] = $ex->getMessage();
}


header('Content-Type: application/json');
echo json_encode($result);
