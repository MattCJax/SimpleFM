<?php
namespace SoliantTest\SimpleFM\Parser;

use Soliant\SimpleFM\Parser\FmLayoutParser;
use Soliant\SimpleFM\Result\FmLayout;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2015-06-27 at 20:56:26.
 */
class FmLayoutParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var FmLayoutParser
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $xml = file_get_contents(__DIR__ . '/../TestAssets/sample_fmpxmllayout.xml');
        $commandDebugUrl = 'fakeCommandDebugUrl';
        $this->object = new FmLayoutParser($xml, $commandDebugUrl);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Soliant\SimpleFM\Parser\FmLayoutParser::__construct
     * @covers Soliant\SimpleFM\Parser\FmLayoutParser::parse
     */
    public function testParse()
    {
        $result = $this->object->parse();
        $this->assertInstanceOf(FmLayout::class, $result);

        // Empty result
        $parser = new FmLayoutParser('', '');
        $result = $parser->parse();
        $this->assertInstanceOf(FmLayout::class, $result);
    }
}
