<?php
namespace Trendwerk\AcfForms\Test;

use Trendwerk\AcfForms\Entry\Entries;
use Trendwerk\AcfForms\Entry\Entry;

class EntryTest extends TestCase
{
    private $postId;

    public function setUp()
    {
        parent::setUp();

        $this->postId = $this->createEntry();
    }

    public function testFind()
    {
        $entry = Entry::find($this->postId);
        $this->assertEquals('Trendwerk\AcfForms\Entry\Entry', get_class($entry));
        $this->assertEquals($this->postId, $entry->getId());
    }

    public function testEmptyFieldGroups()
    {
        $entry = Entry::find($this->postId);
        $this->assertEquals([], $entry->getFieldGroups());
    }

    public function testFieldGroups()
    {
        $fieldGroups = ['testFieldGroup', 'anotherFieldGroup'];

        $entry = Entry::find($this->postId);
        $entry->setFieldGroups($fieldGroups);
        $this->assertEquals($fieldGroups, $entry->getFieldGroups());
    }
}
