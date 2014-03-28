<?php
/**
 * Обработчик шаблонов Twig для Solo-framework
 *
 * PHP version 5
 *
 * @package
 * @author  Andrey Filippov <afi@i-loto.ru>
 */

namespace Solo\UI\Twig;

use Solo\Core\UI\BaseTemplateHandler;
use Solo\Core\UI\ITemplateHandler;

class TemplateHandler extends BaseTemplateHandler implements ITemplateHandler
{
	/**
	 * Список переменных шаблона и их значений
	 *
	 * @var array|null
	 */
	protected $data = null;

	/**
	 * Ctor
	 *
	 * @param array $config Список настроек
	 * @param array $extraData Дополнительные данные из View
	 */
	public function __construct($config, $extraData)
	{
		$loader = new \Twig_Loader_Filesystem($config["templateDirs"]);
		$this->render = new \Twig_Environment($loader, $config["env"]);

		foreach ($config["extensions"] as $ext)
			$this->render->addExtension(new $ext());
	}

	/**
	 * Возвращает результат обработки шаблона
	 *
	 * @param string $template Путь к шаблону
	 *
	 * @return string
	 */
	public function fetch($template)
	{
		$tpl = $this->render->loadTemplate($template);
		return $tpl->render($this->data);
	}
}

