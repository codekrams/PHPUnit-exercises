<?php
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new Article();
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {

        $this->assertSame($this->article->getSlug(), "");
    }

//    public function testSlugHasSpacesReplacedByUnderscores()
//    {
//        $this->article->title="An example article";
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugHasWhitespacesReplacedBySingleUnderscore()
//    {
//        $this->article->title="An  \n     example       article";
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugDoesNotStartOrEndWithAnUnderscore()
//    {
//        $this->article->title=" An example article ";
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }
//
//    public function testSlugDoesNotHaveAnyNonWordCharacters()
//    {
//        $this->article->title=" An! example! article ";
//        $this->assertEquals($this->article->getSlug(), "An_example_article");
//    }

    public function titleProvider()
    {
        return [
            'SlugHasSpacesReplacedByUnderscores'
                => ["An example article", "An_example_article"],
            'SlugHasWhitespacesReplacedBySingleUnderscore'
                =>["An  \n     example       article", "An_example_article"],
            'SlugDoesNotStartOrEndWithAnUnderscore('
                =>[" An example article ", "An_example_article"],
            'SlugDoesNotHaveAnyNonWordCharacters'
                =>[" An! example! article ", "An_example_article"],
        ];
    }


    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title= $title;

        $this->assertEquals($this->article->getSlug(), $slug);

    }
}