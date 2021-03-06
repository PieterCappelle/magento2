<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Ui\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Controller\Adminhtml\AbstractAction;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponentInterface;
use Magento\Ui\Model\UiComponentTypeResolver;

/**
 * Class Render
 */
class Render extends AbstractAction
{
    /**
     * @var \Magento\Ui\Model\UiComponentTypeResolver
     */
    private $contentTypeResolver;

    /**
     * @param Context $context
     * @param UiComponentFactory $factory
     * @param UiComponentTypeResolver $contentTypeResolver
     */
    public function __construct(
        Context $context,
        UiComponentFactory $factory,
        UiComponentTypeResolver $contentTypeResolver
    ) {
        parent::__construct($context, $factory);
        $this->contentTypeResolver = $contentTypeResolver;
    }

    /**
     * Action for AJAX request
     *
     * @return void
     */
    public function execute()
    {
        if ($this->_request->getParam('namespace') === null) {
            $this->_redirect('admin/noroute');
            return;
        }

        $component = $this->factory->create($this->getRequest()->getParam('namespace'));
        $this->prepareComponent($component);
        $this->getResponse()->appendBody((string) $component->render());

        $contentType = $this->contentTypeResolver->resolve($component->getContext());
        $this->getResponse()->setHeader('Content-Type', $contentType, true);
    }

    /**
     * Call prepare method in the component UI
     *
     * @param UiComponentInterface $component
     * @return void
     */
    protected function prepareComponent(UiComponentInterface $component)
    {
        foreach ($component->getChildComponents() as $child) {
            $this->prepareComponent($child);
        }
        $component->prepare();
    }
}
