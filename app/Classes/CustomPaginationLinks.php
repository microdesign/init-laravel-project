<?php namespace App\Classes;

use Illuminate\Pagination\BootstrapThreePresenter;

class CustomPaginationLinks extends BootstrapThreePresenter {

//<li><a href="#">&laquo;</a></li>
//<li><a href="#">1</a></li>
//<li><span>2</span></li>
//<li><a href="#">3</a></li>
//<li><a href="#">4</a></li>
//<li><a href="#">5</a></li>
//<li><a href="#">&raquo;</a></li>

	public function getActivePageWrapper($text)
	{
		return '<li><span>'.$text.'</span></li>';
	}

	public function getDisabledTextWrapper($text)
	{
		return '<li class="disabled"><a href="#">'.$text.'</a></li>';
	}

	public function getAvailablePageWrapper($url, $page, $rel = null)
	{
		return '<li><a href="'.$url.'">'.$page.'</a></li>';
	}

	public function render()
	{
		if ($this->hasPages())
		{
			return sprintf(
				'<ul class="pagination"> %s %s %s </ul>',
				$this->getPreviousButton('<img src="'.url('images/arrow-left.png').'">'),
				$this->getLinks(),
				$this->getNextButton('<img src="'.url('images/arrow-right.png').'">')
			);
		}

		return '';
	}

}