<?php

namespace Networkteam\PowermailReplyTo\EventListener;

use In2code\Powermail\Domain\Service\Mail\SendMailService;
use In2code\Powermail\Events\SendMailServicePrepareAndSendEvent;
use In2code\Powermail\Utility\TypoScriptUtility;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MailUtility;

class ManipulateReceiverMail
{
    public function moveSenderToReplyTo(SendMailServicePrepareAndSendEvent $event): void
    {
        if ($event->getSendMailService()->getType() === 'receiver') {
            $overwrittenSender = TypoScriptUtility::overwriteValueFromTypoScript('', $event->getSendMailService()->getOverwriteConfig(), 'senderEmail');

            if (!GeneralUtility::validEmail($overwrittenSender)) {
                $event->getMailMessage()
                    ->setReplyTo([$event->getEmail()['senderEmail'] => $event->getEmail()['senderName']])
                    ->setFrom([
                        MailUtility::getSystemFromAddress() => MailUtility::getSystemFromName()
                    ]);
            }
        }
    }
}
