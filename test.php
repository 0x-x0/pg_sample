<?php
require_once("sql.php");
class PGTest extends PHPUnit_Framework_TestCase {
  public function test() {
    $sql = new PG();
    $doc = $sql->main();
    echo $doc;
    $this->assertNotEquals($doc, true);
  }
}
?>
