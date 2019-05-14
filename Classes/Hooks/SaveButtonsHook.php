<?php

namespace Goran\SaveCloseCe\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Template\Components\Buttons\InputButton;

/**
 * Add an extra save and close button at the end
 *
 * Class SaveButtonHook
 * @package Goran\SaveCloseCe\Hooks
 */
Class SaveCloseHook
{
    /**
     * @param array $params
     * @param $buttonBar
     * @return array
     */
    public function addSaveCloseButton($params, &$buttonBar)
    {
        $buttons = $params['buttons'];
        $saveButton = $buttons[\TYPO3\CMS\Backend\Template\Components\ButtonBar::BUTTON_POSITION_LEFT][2][0];
        if ($saveButton instanceof InputButton) {
          $iconFactory = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconFactory::class);
          $lang = GeneralUtility::makeInstance('TYPO3\\CMS\\Lang\\LanguageService');
          $lang->init(trim(GeneralUtility::_POST('language')));

          $saveCloseButton = $buttonBar->makeInputButton()
            ->setName('_saveandclosedok')
            ->setValue('1')
            ->setForm($saveButton->getForm())
            ->setTitle($lang->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:rm.saveCloseDoc'))
            ->setIcon($iconFactory->getIcon('actions-document-save-close', \TYPO3\CMS\Core\Imaging\Icon::SIZE_SMALL))
            ->setShowLabelText(true);

          $buttons[\TYPO3\CMS\Backend\Template\Components\ButtonBar::BUTTON_POSITION_LEFT][2][] = $saveCloseButton;
        }
        return $buttons;
    }
}
