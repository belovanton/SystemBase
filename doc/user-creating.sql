CREATE USER '<?php echo $username ?>'@'<?php echo $host ?>' IDENTIFIED BY '<?php echo $password ?>';
GRANT INSERT,SELECT,UPDATE ON `<?php echo $dbname ?>`.`rb_user` TO 'test'@'localhost';
REVOKE DELETE ON `<?php echo $dbname ?>`.`rb_user` TO 'test'@'localhost';
