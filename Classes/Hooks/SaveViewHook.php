<?php

namespace Goran\SaveCloseCe\Hooks;

use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Localization\LanguageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Template\Components\Buttons\InputButton;

/**
 * Add an extra save and view button at the end
 *
 * Class SaveViewHook
 * @package Goran\SaveCloseCe\Hooks
 */
class SaveViewHook
{
    /**
     * @param array $params
     * @param $buttonBar
     * @return array
     */
    public function addSaveViewButton($params, &$buttonBar): array
    {
        $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('save_close_ce');
        $showButton = (bool)$extensionConfiguration['saveAndView']['button'];
        $showLabel = (bool)$extensionConfiguration['saveAndView']['label'];
        $buttons = $params['buttons'];

        if ($showButton === false) {
            return $buttons;
        }

        $button = $buttons[ButtonBar::BUTTON_POSITION_LEFT][2][0] ?? null;
        if ($button instanceof InputButton) {
            /** @var IconFactory $iconFactory */
            $iconFactory = GeneralUtility::makeInstance(IconFactory::class);

            $saveAndViewButton = $buttonBar->makeInputButton()
                ->setName('_savedokview')
                ->setValue('1')
                ->setForm($button->getForm())
                ->setTitle($this->getLanguageService()->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:rm.saveDocShow'))
                ->setIcon($iconFactory->getIcon('actions-document-save-view', Icon::SIZE_SMALL))
                ->setShowLabelText($showLabel);

            $buttons[ButtonBar::BUTTON_POSITION_LEFT][2][] = $saveAndViewButton;
        }
        return $buttons;
    }

    /**
     * Returns the language service
     * @return LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }
}
