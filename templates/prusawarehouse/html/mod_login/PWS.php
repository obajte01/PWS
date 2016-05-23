<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_users/helpers/route.php';

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

?>
<form
    action="<?php echo JRoute::_(htmlspecialchars(JUri::getInstance()->toString()), true, $params->get('usesecure')); ?>"
    method="post" id="login-form" class="form-inline">
    <?php if ($params->get('pretext')) : ?>
        <div class="pretext text-center">
            <p><?php echo $params->get('pretext'); ?></p>
        </div>
    <?php endif; ?>
    <div class="userdata">
        <div id="form-login-username" class="control-group">
            <div class="controls">
                <?php if (!$params->get('usetext')) : ?>
                    <div class="input-prepend row">
                        <span class="login-pws-user">
                            <i class="fa fa-user fa-2"></i>
                        </span>
                        <input id="modlgn-username" type="text" name="username" class="form-control" tabindex="0"
                               size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"/>
                    </div>
                <?php else: ?>
                    <label for="modlgn-username"><?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?></label>
                    <input id="modlgn-username" type="text" name="username" class="input-small" tabindex="0"
                           size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME') ?>"/>
                <?php endif; ?>
            </div>
        </div>
        <div id="form-login-password" class="control-group">
            <div class="controls">
                <?php if (!$params->get('usetext')) : ?>
                    <div class="input-prepend row">
							<span class="login-pws-pass">
                                <i class="fa fa-lock"></i>
                            </span>

                        <input id="modlgn-passwd" type="password" name="password" class="form-control"
                               tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>"/>
                    </div>
                <?php else: ?>
                    <label for="modlgn-passwd"><?php echo JText::_('JGLOBAL_PASSWORD') ?></label>
                    <input id="modlgn-passwd" type="password" name="password" class="input-small" tabindex="0"
                           size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>"/>
                <?php endif; ?>
            </div>
        </div>
        <?php if (count($twofactormethods) > 1): ?>
            <div id="form-login-secretkey" class="control-group">
                <div class="controls">
                    <?php if (!$params->get('usetext')) : ?>
                        <div class="input-prepend input-append">
						<span class="add-on">
							<span class="icon-star hasTooltip" title="<?php echo JText::_('JGLOBAL_SECRETKEY'); ?>">
							</span>
								<label for="modlgn-secretkey"
                                       class="element-invisible"><?php echo JText::_('JGLOBAL_SECRETKEY'); ?>
                                </label>
						</span>
                            <input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey"
                                   class="input-small" tabindex="0" size="18"
                                   placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>"/>
						<span class="btn width-auto hasTooltip"
                              title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
							<span class="icon-help"></span>
						</span>
                        </div>
                    <?php else: ?>
                        <label for="modlgn-secretkey"><?php echo JText::_('JGLOBAL_SECRETKEY') ?></label>
                        <input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey"
                               class="input-small" tabindex="0" size="18"
                               placeholder="<?php echo JText::_('JGLOBAL_SECRETKEY') ?>"/>
                        <span class="btn width-auto hasTooltip"
                              title="<?php echo JText::_('JGLOBAL_SECRETKEY_HELP'); ?>">
						<span class="icon-help"></span>
					</span>
                    <?php endif; ?>

                </div>
            </div>
        <?php endif; ?>
        <!--
        <?php //if (JPluginHelper::isEnabled('system', 'remember')) : ?>
            <div id="form-login-remember" class="control-group checkbox">
                <label for="modlgn-remember"
                       class="control-label"><?php //JText::_('MOD_LOGIN_REMEMBER_ME') ?></label> <input
                    id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
            </div>
        <?php //endif; ?>
        -->
        <div id="form-login-submit" class="control-group">
            <div class="control">
                <button type="submit" tabindex="0" name="Submit"
                        class="btn btn-primary"><?php echo JText::_('JLOGIN') ?></button>
            </div>
        </div>
        <?php
        $usersConfig = JComponentHelper::getParams('com_users'); ?>
        <ul class="unstyled">
            <?php if ($usersConfig->get('allowUserRegistration')) : ?>
                <li>
                    <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=' . UsersHelperRoute::getRegistrationRoute()); ?>">
                        <?php echo JText::_('MOD_LOGIN_REGISTER'); ?> <span class="icon-arrow-right"></span></a>
                </li>
            <?php endif; ?>
        </ul>
        <input type="hidden" name="option" value="com_users"/>
        <input type="hidden" name="task" value="user2.login"/>
        <input type="hidden" name="return" value="<?php echo $return; ?>"/>
        <?php echo JHtml::_('form.token'); ?>
    </div>
    <?php if ($params->get('posttext')) : ?>
        <div class="posttext">
            <p><?php echo $params->get('posttext'); ?></p>
        </div>
    <?php endif; ?>
</form>
</div>