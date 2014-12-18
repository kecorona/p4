<?php
 
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Illuminate\Foundation\Testing\ApplicationTrait;

use PHPUnit_Framework_Assert as PHPUnit;

use Symfony\Component\DomCrawler\Crawler;
 
/**
 * Behat context class.
 */
class LaravelFeatureContext implements SnippetAcceptingContext
{
    /**
     * Responsible for providing a Laravel app instance.
     */
    use ApplicationTrait;
 
    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct()
    {
    }
 
    /**
     * @BeforeScenario
     */
    public function setUp()
    {
        if ( ! $this->app)
        {
            $this->refreshApplication();
        }
    }
 
    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $unitTesting = true;
 
        $testEnvironment = 'testing';
 
        return require __DIR__.'/../../bootstrap/start.php';
    }
 
    /**
     * @Given I am logged in
     */
    public function iAmLoggedIn()
    {
        $user = new User;
 
        $this->be($user);
    }
 
    /**
     * @When I visit :uri
     */
    public function iVisit($uri)
    {
        $this->call('GET', $uri);
    }
 
    /**
     * @Then I should see :text
     */
    public function iShouldSee($text)
    {
        $crawler = new Crawler($this->client->getResponse()->getContent());
 
        PHPUnit::assertCount(1, $crawler->filterXpath("//text()[. = '{$text}']"));
    }
}