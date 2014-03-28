Компонент solo-twig
=========

Для интеграции шаблонизатора Twig в Solo-фреймворк.

Установка
=========

Установка через composer:

	"require": {
		"solo/ui-twig": "dev-master"
	}


Настройка
=========

В файле конфигурации фреймворка common.php изменить секцию components:

	"controller" => array(

		// Класс, реализующий обработку запросов (не менять)
		"@class" => "Solo\\Core\\Controller",

		// путь к классу обработчика шаблонов
		"rendererClass" => "Solo\\UI\\Twig\\TemplateHandler",

		// расширение файлов шаблонов
		"templateExtension" => ".html",

		// режим отладки
		"isDebug" => true,

		// Настройки обработчика шаблонов
		"options" => array
		(
			// список каталогов, в которых twig будет искать файлы шаблонов, к примеру:
			"templateDirs" => array(
				BASE_DIRECTORY ."/src/apps/App/templates/layouts",
				BASE_DIRECTORY ."/src/apps/App/templates"
			),

			// параметры, передаваемые в конструктор класса Twig_Environment
			"env" => array(
				"cache" => BASE_DIRECTORY . "/var/cache",
				"debug" => true
			),

			// список имен классов-расширений
			"extensions" => array(
				"Solo\\UI\\Twig\\Extensions\\Link",
			)
		)
	)


Изменения в шаблонах
====================

Разметка макета (layout) должна содержать функцию include следующего вида:

	<?xml version="1.0" encoding="UTF-8" ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>{$title}</title>
	</head>

	<body>

		{% include CURRENT_VIEW_TEMPLATE %}

	</body>
	</html>
