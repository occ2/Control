<?php
/*
 * The MIT License
 *
 * Copyright 2018 Milan Onderka <milan_onderka@occ2.cz>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace occ2\control;

use Contributte\EventDispatcher\Events\AbstractEvent as Event;
use Nette\Application\UI\Control;
use Nette\Application\UI\Presenter;
use Nette\Utils\ArrayHash;

/**
 * ControlEventData
 *
 * extend base event to be a container on Presenter and Control object
 *
 * @author Milan Onderka <milan_onderka@occ2.cz>
 * @version 1.0.0
 */
class ControlEventData extends Event
{
    /**
     * @var ArrayHash | array
     */
    protected $data;

    /**
     * @var string | null
     */
    protected $event;

    /**
     * @var Control | null
     */
    protected $control;

    /**
     * @param array | ArrayHash $data
     * @param Control $control
     * @param string $event
     * @return void
     */
    public function __construct($data, Control $control=null, string $event = null)
    {
        $this->control = $control;
        $this->data = $data;
        $this->event = $event;
        return;
    }

    /**
     * control getter
     * @return Control | null
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * data getter
     * @return ArrayHash | array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * event name getter
     * @return string | null
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * presenter getter
     * @return Presenter | null
     */
    public function getPresenter()
    {
        return $this->control instanceof Control ? $this->control->getPresenter() : null;
    }
}