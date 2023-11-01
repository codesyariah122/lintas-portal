<?php
/**
 * @author Puji Ermanto <pujiermanto@gmail.com>
*/

namespace System;

class ApiSystem {

	public static function inputValidationSystem($data, $rules)
	{
		$errors = [];
		foreach ($rules as $field => $rule) {
			if (empty($data[$field])) {
				$errors[$field] = "$field is required.";
			} else {
				if (isset($rule['email']) && $rule['email']) {
					if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
						$errors[$field] = "$field is not a valid email.";
					}
				}
				if (isset($rule['minLength']) && strlen($data[$field]) < $rule['minLength']) {
					$errors[$field] = "$field should be at least {$rule['minLength']} characters long.";
				}

				if ($field === 'password' && isset($rule['passwordStrength'])) {
					if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $data[$field])) {
						$errors[$field] = "$field must contain at least one uppercase letter, one lowercase letter, and one digit.";
					}
				}

				if ($field === 'confirm_password') {
					if ($data['password'] !== $data['confirm_password']) {
						$errors['confirm_password'] = 'Passwords do not match.';
					}
				}

				if (isset($rule['text'])) {
					if ($rule['text'] === 'email' && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
						$errors[$field] = "$field is not a valid email.";
					} elseif ($rule['text'] === 'password') {
						if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', $data[$field])) {
							$errors[$field] = "$field must contain at least one uppercase letter, one lowercase letter, and one digit.";
						}
					} elseif ($rule['text'] === 'confirm_password') {
						if ($data['password'] !== $data['confirm_password']) {
							$errors['confirm_password'] = 'Passwords do not match.';
						}
					} elseif ($rule['text'] === 'custom_rule') {
					}
				}

                // validation file image
				if (isset($rule['file'])) {
					$file = $data[$field];
					if ($file['error'] !== UPLOAD_ERR_OK) {
						$errors[$field] = "Error uploading $field.";
					} else {
                        $maxFileSize = 10 * 1024 * 1024; // 10 MB
                        if ($file['size'] > $maxFileSize) {
                        	$errors[$field] = "$field should be at most 10 MB.";
                        }
                        
                        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/png'];
                        if (!in_array($file['type'], $allowedMimes)) {
                        	$errors[$field] = "$field must be a JPG, JPEG, or PNG file.";
                        }
                    }
                }
            }
        }

        return $errors;
    }

    public static function getHttpCurl($url, $apiKey) 
    {
    	$curl = curl_init();

    	curl_setopt_array($curl, array(
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_ENCODING => "",
    		CURLOPT_MAXREDIRS => 10,
    		CURLOPT_TIMEOUT => 30,
    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		CURLOPT_CUSTOMREQUEST => "GET",
    		CURLOPT_HTTPHEADER => array(
    			"api_key: " . $apiKey
    		),
    	));

    	$response = curl_exec($curl);
    	$err = curl_error($curl);

    	curl_close($curl);

    	if ($err) {
    		return "cURL Error #: " . $err;
    	} else {
    		return $response;
    	}
    }

    public static function getHttpContents($url)
    {
    	if(isset($url)) {    		
    		$response = file_get_contents($url);
    		return $response;
    	}
    }

    public static function jsonResponseGenerate($data)
    {
    	if (is_object($data) || is_array($data)) {
    		header('Content-Type: application/json');
    		echo json_encode($data);
    	}
    }

    public static function cleanInputSystem($input)
    {
    	if (is_array($input)) {
    		return array_map([self::class, 'cleanInput'], $input);
    	} else {
    		return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    	}
    }

    public static function cleanInput($input)
    {
    	return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }
}