<?php namespace std\controllers\dialogs\confirm;

class Main extends \Controller
{
    public function view()
    {
        $v = $this->v();

        /**
         * @var $confirmCall \ewma\Controllers\Call
         * @var $discardCall \ewma\Controllers\Call
         */
        $confirmCall = $this->_call($this->data('confirm_call'))->data('confirmed', true);
        $discardCall = $this->_call($this->data('discard_call'))->data('discarded', true);

        $v->assign([
                       'MESSAGE'        => isset($this->data['message']) ? $this->data['message'] : '',
                       'CONFIRM_BUTTON' => $this->c('\std\ui button:view', [
                           'path'    => $confirmCall->path(),
                           'data'    => $confirmCall->data(),
                           'class'   => 'button red',
                           'content' => $this->data('confirm_label') ? $this->data['confirm_label'] : 'Да'
                       ]),
                       'DISCARD_BUTTON' => $this->c('\std\ui button:view', [
                           'path'    => $discardCall->path(),
                           'data'    => $discardCall->data(),
                           'class'   => 'button blue',
                           'content' => $this->data('discard_label') ? $this->data['discard_label'] : 'Нет'
                       ]),
                   ]);

        $this->css(':\css\std~');

        return $v;
    }
}
