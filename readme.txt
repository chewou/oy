oy框架总体介绍
author:omita
架构模式：mvc

关于mvc各模块的介绍
Controller：文件命名方式
				name+Control.class.php
			文件内类的命名方式
				name+Control

Model:		文件命名方式
				name+Model.class.php
			文件内类的命名方式
				name+Model
			模型初始化方法
				$model = M(name)——name为模型名，此初始化一个具体的模型类对象
			模型方法调用
				$model->method();


View:		文件命名方式
				name+Model.class.php
			文件内类的命名方式
				name+Model
			视图展示方法
				VIEW::display(param1,param2),param1为模板文件，param2为传递给模板的数据，用数组的方式传输


核心类：
pdo.class.php——pdo函数写的数据库操作接口
	函数成员：
		insert()
		select()
		query()
