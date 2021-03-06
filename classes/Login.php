<?php
	class Login 
	{
		public static function isLoggedIn()
		{
			if(isset($_COOKIE['LANID']))
			{
				if(DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['LANID']))))
				{
					$userid = DB::query('SELECT user_id FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['LANID'])))[0]['user_id'];

					if(isset($_COOKIE['LANID_']))
					{
						return $userid;
					} else {
						$cstrong = True;
						$token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
						DB::query('INSERT INTO login_tokens VALUES (\'\',:token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
						DB::query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['LANID'])));

						setcookie('LANID', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
						setcookie('LANID_','1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
						
						return $userid;
					}

					
				}
			}

			return false;
		}
	}
?>