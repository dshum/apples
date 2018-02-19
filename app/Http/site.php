<?php

use Moonlight\Main\Site;
use Moonlight\Main\Item;
use Moonlight\Main\Element;
use Moonlight\Main\Rubric;
use Moonlight\Properties\BaseProperty;
use Moonlight\Properties\MainProperty;
use Moonlight\Properties\OrderProperty;
use Moonlight\Properties\CheckboxProperty;
use Moonlight\Properties\DatetimeProperty;
use Moonlight\Properties\DateProperty;
use Moonlight\Properties\FloatProperty;
use Moonlight\Properties\ImageProperty;
use Moonlight\Properties\IntegerProperty;
use Moonlight\Properties\OneToOneProperty;
use Moonlight\Properties\ManyToManyProperty;
use Moonlight\Properties\PasswordProperty;
use Moonlight\Properties\RichtextProperty;
use Moonlight\Properties\TextareaProperty;
use Moonlight\Properties\TextfieldProperty;
use Moonlight\Properties\PluginProperty;
use Moonlight\Properties\VirtualProperty;

$site = \App::make('site');

$site->
    
    /*
	 * Раздел сайта
	 */

	addItem(
		Item::create('App\Section')->
		setTitle('Раздел сайта')->
		setRoot(true)->
        setCreate(true)->
		setElementPermissions(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			TextfieldProperty::create('url')->
			setTitle('Адрес страницы')->
            setRequired(true)->
			addRule('regex:/^[a-z0-9\-]+$/i', 'Допускаются латинские буквы, цифры и дефис.')
		)->
		addProperty(
			TextfieldProperty::create('title')->
			setTitle('Title')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			TextfieldProperty::create('h1')->
			setTitle('H1')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			TextfieldProperty::create('meta_keywords')->
			setTitle('META Keywords')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			TextareaProperty::create('meta_description')->
			setTitle('META Description')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			RichtextProperty::create('fullcontent')->
			setTitle('Текст раздела')
		)->
        addProperty(
			OneToOneProperty::create('section_id')->
			setTitle('Раздел сайта')->
			setRelatedClass('App\Section')->
			setParent(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Служебный раздел
	 */

	addItem(
		Item::create('App\ServiceSection')->
		setTitle('Служебный раздел')->
		setRoot(true)->
        setCreate(true)->
		setElementPermissions(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Настройки сайта
	 */

	addItem(
		Item::create('App\SiteSettings')->
		setTitle('Настройки сайта')->
		setRoot(true)->
		setCreate(true)->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			TextfieldProperty::create('title')->
			setTitle('Title')->
			setRequired(true)->
			setShow(true)
		)->
        addProperty(
			TextfieldProperty::create('meta_keywords')->
			setTitle('META Keywords')->
			setShow(true)
		)->
		addProperty(
			TextareaProperty::create('meta_description')->
			setTitle('META Description')->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Товар
	 */

	addItem(
		Item::create('App\Good')->
		setTitle('Товар')->
		setRoot(true)->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			FloatProperty::create('price')->
			setTitle('Цена, руб.')->
			setRequired(true)->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			FloatProperty::create('supplier_price')->
			setTitle('Цена поставщика, руб.')->
			setRequired(true)->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			RichtextProperty::create('fullcontent')->
			setTitle('Описание')
		)->
		addProperty(
			ImageProperty::create('photo')->
			setTitle('Фотография')->
			setResize(600, 600, 100)->
			addResize('medium', 400, 400, 100)->
			addResize('small', 200, 200, 100)->
			setShow(true)
		)->
		addProperty(
			CheckboxProperty::create('available')->
			setTitle('Наличие')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			CheckboxProperty::create('hide')->
			setTitle('Скрыть')->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			CheckboxProperty::create('new')->
			setTitle('NEW')
		)->
		addProperty(
			CheckboxProperty::create('special')->
			setTitle('Акция')
		)->
		addProperty(
			OneToOneProperty::create('color_id')->
			setTitle('Цвет')->
			setRelatedClass('App\Color')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('country_id')->
			setTitle('Страна')->
			setRelatedClass('App\Country')->
			setRequired(true)->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Цвет товара
	 */

	addItem(
		Item::create('App\Color')->
		setTitle('Цвет товара')->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Страна
	 */

	addItem(
		Item::create('App\Country')->
		setTitle('Страна')->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Категория расхода
	 */

	addItem(
		Item::create('App\ExpenseCategory')->
		setTitle('Категория расхода')->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Источник расхода
	 */

	addItem(
		Item::create('App\ExpenseSource')->
		setTitle('Источник расхода')->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Расход
	 */

	addItem(
		Item::create('App\Expense')->
		setTitle('Расход')->
        setCreate(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			FloatProperty::create('sum')->
			setTitle('Сумма, руб.')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('category_id')->
			setTitle('Категория расхода')->
			setRelatedClass('App\ExpenseCategory')->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('source_id')->
			setTitle('Источник расхода')->
			setRelatedClass('App\ExpenseSource')->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			TextareaProperty::create('comments')->
			setTitle('Комментарий')->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Статус заказа
	 */

	addItem(
		Item::create('App\OrderState')->
		setTitle('Статус заказа')->
        setCreate(true)->
		addOrder()->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')->
			setRequired(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->
    
    /*
	 * Покупатель
	 */

	addItem(
		Item::create('App\User')->
		setTitle('Покупатель')->
        setCreate(true)->
        setPerPage(10)->
        addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('email')->
			setTitle('E-mail')->
			addRule('email', 'Некорректный адрес электронной почты')->
			setRequired(true)
		)->
		addProperty(
			PasswordProperty::create('password')->
			setTitle('Пароль')
		)->
        addProperty(
			TextfieldProperty::create('first_name')->
			setTitle('Имя')->
			setRequired(true)->
			setShow(true)->
			setEditable(true)
		)->
        addProperty(
			TextfieldProperty::create('last_name')->
			setTitle('Фамилия')->
			setRequired(true)->
			setShow(true)->
			setEditable(true)
		)->
		addProperty(
			TextfieldProperty::create('phone')->
			setTitle('Телефон')->
			setRequired(true)->
			setShow(true)->
			setEditable(true)
		)->
        addProperty(
			CheckboxProperty::create('activated')->
			setTitle('Активирован')->
			setShow(true)->
			setEditable(true)
		)->
        addProperty(
			CheckboxProperty::create('banned')->
			setTitle('Заблокирован')->
			setShow(true)->
			setEditable(true)
		)->
        addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
			setRequired(true)->
			setParent(true)->
            setOpenItem(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Товар в корзине
	 */

	addItem(
		Item::create('App\CartPosition')->
		setTitle('Товар в корзине')->
        setCreate(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')
		)->
		addProperty(
			OneToOneProperty::create('user_id')->
			setTitle('Покупатель')->
			setRelatedClass('App\User')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('good_id')->
			setTitle('Товар')->
			setRelatedClass('App\Good')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			IntegerProperty::create('amount')->
			setTitle('Количество')->
			setRequired(true)->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Адрес доставки
	 */

	addItem(
		Item::create('App\DeliveryAddress')->
		setTitle('Адрес доставки')->
        setCreate(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')
		)->
		addProperty(
			TextareaProperty::create('address')->
			setTitle('Адрес')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('user_id')->
			setTitle('Покупатель')->
			setRelatedClass('App\User')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Заказ
	 */

	addItem(
		Item::create('App\Order')->
		setTitle('Заказ')->
        setCreate(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')
		)->
		addProperty(
			FloatProperty::create('total_sum')->
			setTitle('Полная сумма, руб.')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			FloatProperty::create('supplier_sum')->
			setTitle('Сумма поставщика, руб.')->
			setRequired(true)
		)->
		addProperty(
			FloatProperty::create('delivery_price')->
			setTitle('Стоимость доставки, руб.')->
			setRequired()
		)->
		addProperty(
			FloatProperty::create('net_sum')->
			setTitle('Итого, руб.')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('user_id')->
			setTitle('Покупатель')->
			setRelatedClass('App\User')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			TextfieldProperty::create('face')->
			setTitle('Имя')
		)->
		addProperty(
			TextfieldProperty::create('phone')->
			setTitle('Телефон')
		)->
		addProperty(
			OneToOneProperty::create('order_state_id')->
			setTitle('Статус')->
			setRelatedClass('App\OrderState')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('delivery_address_id')->
			setTitle('Адрес доставки')->
			setRelatedClass('App\DeliveryAddress')->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('delivery_at')->
			setTitle('Дата доставки')->
			setShow(true)
		)->
		addProperty(
			TextareaProperty::create('comments')->
			setTitle('Комментарий')
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('App\ServiceSection')->
            setOpenItem(true)->
			setRequired(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	/*
	 * Товар в заказе
	 */

	addItem(
		Item::create('App\OrderPosition')->
		setTitle('Товар в заказе')->
        setCreate(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			MainProperty::create('name')->
			setTitle('Название')
		)->
		addProperty(
			OneToOneProperty::create('order_id')->
			setTitle('Заказ')->
			setRelatedClass('App\Order')->
			setParent(true)->
            setOpenItem(true)->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('good_id')->
			setTitle('Товар')->
			setRelatedClass('App\Good')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			FloatProperty::create('price')->
			setTitle('Цена, руб.')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			FloatProperty::create('supplier_price')->
			setTitle('Цена поставщика, руб.')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			IntegerProperty::create('amount')->
			setTitle('Количество')->
			setRequired(true)->
			setShow(true)
		)->
		addTimestamps()->
		addSoftDeletes()
	)->

	bind(Site::ROOT, ['App.Good', 'App.Section', 'App.ServiceSection', 'App.SiteSettings'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_ORDERS', 1)), ['App.Order'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_USERS', 2)), ['App.User'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_DICTS', 3)), ['App.ServiceSection'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_COLORS', 4)), ['App.Color'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_COUNTRIES', 5)), ['App.Country'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_EXPENSES', 6)), ['App.Expense'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_EXPENSE_CATEGORIES', 7)), ['App.ExpenseCategory'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_EXPENSE_SOURCES', 8)), ['App.ExpenseSource'])->
	bind(sprintf('App.ServiceSection.%d', env('SITE_ORDER_STATES', 9)), ['App.OrderState'])->
	bind('App.User', ['App.Order', 'App.DeliveryAddress', 'App.CartPosition'])->
	bind('App.Order', ['App.OrderPosition'])->

	addRubric(
		Rubric::create('goods', 'Товары')->
		addList('App.Good')
	)->
	addRubric(
		Rubric::create('sections', 'Разделы сайта')->
		addList([Site::ROOT => 'App.Section'])
	)->
	addRubric(
		Rubric::create('service_sections', 'Служебные разделы')->
		addList([Site::ROOT => 'App.ServiceSection'])
	)->
	addRubric(
		Rubric::create('dictionaries', 'Справочники')->
		addList([sprintf('App.ServiceSection.%d', env('SITE_DICTS', 3)) => 'App.ServiceSection'])
	)->
	addRubric(
		Rubric::create('site_settings', 'Настройки сайта')->
		addList('App.SiteSettings')
	)->

	end();