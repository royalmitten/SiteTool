<?php


namespace SiteTool\Event\SkippingLinkWatcherEvent;

use SiteTool\Event\SkippingLinkWatcherEvent;
use SiteTool\Processor\Rules;
use Zend\EventManager\Event;
use SiteTool\Writer\OutputWriter;
use SiteTool\Processor\SkippingLinkWatcher;
use SiteTool\EventManager;


class SkippingLinkWatcherZendEvent implements SkippingLinkWatcherEvent
{
    /** @var SkippingLinkWatcher  */
    private $skippingLinkWatcher;
    
    /** @var OutputWriter  */
    private $outputWriter;
    
    public function __construct(
        EventManager $eventManager,
        Rules $rules,
        OutputWriter $outputWriter,
        SkippingLinkWatcher $skippingLinkWatcher,
        $skippingLinkEvent
    ) {
        $this->rules = $rules;
        $this->eventManager = $eventManager;
        $this->outputWriter = $outputWriter;
        $this->skippingLinkWatcher = $skippingLinkWatcher;
        $eventManager->attach($skippingLinkEvent, [$this, 'skippingLinkEvent'], 'Log skipped links');
    }
    
    public function skippingLinkEvent(Event $e)
    {
        $params = $e->getParams();
        $this->skippingLinkWatcher->skippingLink($params[0], $params[1], $this);
    }
    
    public function skipping($foo)
    {
        $this->outputWriter->write(
            \SiteTool\Writer\OutputWriter::PROGRESS,
            $foo
        );
    }
}