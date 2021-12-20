<?php

call_user_func(function () {
    /** @var \TYPO3\CMS\Extbase\SignalSlot\Dispatcher $signalSlotDispatcher */
    $signalSlotDispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\SignalSlot\Dispatcher::class);
    $signalSlotDispatcher->connect(
        \In2code\Powermail\Domain\Service\Mail\SendMailService::class,
        'sendTemplateEmailBeforeSend',
        \Networkteam\PowermailReplyTo\Signal\ManipulateReceiverMail::class,
        'moveSenderToReplyTo'
    );
});
