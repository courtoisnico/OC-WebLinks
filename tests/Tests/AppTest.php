<?php
/**
 * Created by PhpStorm.
 * User: ncourtois
 * Date: 19/08/2016
 * Time: 18:07
 */

namespace WebLinks\Tests;

require_once __DIR__.'/../../vendor/autoload.php';

use Silex\WebTestCase ;

class AppTest extends WebTestCase
{
    /**
     * Basic, application-wide functional test inspired by Symfony best practices.
     * Simply checks that all application URLs load successfully.
     * During test execution, this method is called for each URL returned by the provideUrls method.
     *
     * @dataProvider provideUrls
     */
    public function testPageIsSuccessful($url){
        $client = $this->createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $app = new  \Silex\Application();

        require __DIR__.'/../../app/config/dev.php';
        require __DIR__.'/../../app/app.php';
        require __DIR__.'/../../app/routes.php';

        // Generate raw exception instead of HTML pages if errors occur
        $app['exception_handler']->disable();
        // Simulate sessions for testing
        $app['session.test'] = true;
        // Enable anonymous access to admin zone
        $app['security.access_rules'] = array();

        return $app;
    }

    /**
     * Provides all valid application URLs.
     *
     * @return array The list of all valid application URLs.
     */
    public function provideUrls()
    {
        return array(
            array('/'),
            array('/login'),
            array('/admin'),
//            array('/link/submit'),
        );
    }
}