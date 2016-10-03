<?php
namespace SoliantTest\SimpleFM\Result;

use Soliant\SimpleFM\Parser\FmResultSetParser;
use Soliant\SimpleFM\Result\FmResultSet;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-06-27 at 21:16:44.
 */
class FmResultSetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FmResultSet
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $xml = file_get_contents(__DIR__ . '/../TestAssets/sample_fmresultset.xml');
        $commandDebugUrl = 'fakeCommandDebugUrl';
        $parser = new FmResultSetParser($xml);
        $this->object = $parser->parse($commandDebugUrl);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Soliant\SimpleFM\Result\FmResultSet::__construct
     * @covers Soliant\SimpleFM\Result\FmResultSet::toArray
     */
    public function testToArray()
    {
        $this->assertInstanceOf(FmResultSet::class, $this->object);
        $this->assertArrayHasKey('rows', $this->object->toArray());
    }

    /**
     * @covers Soliant\SimpleFM\Result\FmResultSet::getCount
     * @covers Soliant\SimpleFM\Result\FmResultSet::getFetchSize
     * @covers Soliant\SimpleFM\Result\FmResultSet::getRows
     */
    public function testGetters()
    {
        $this->assertEquals(17, $this->object->getCount());
        $this->assertEquals(17, $this->object->getFetchSize());
        $this->assertEquals(17, count($this->object->getRows()));
    }
}