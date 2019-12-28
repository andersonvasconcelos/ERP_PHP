<?php 
require_once("lib/Iugu.php");

Iugu::setApiKey("0d623237d26423e3d606e6bf182fd0af");


$dados = Iugu_Account::search("BE20B61AA7D1467D98F4B1DCA47A4E6E");

echo "<pre>";
print_r($dados);
echo "</pre>";