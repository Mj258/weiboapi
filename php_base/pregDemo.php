<?php
/* 1. 正则表达式就是描述字符串排列模式的一种自定义语法规则。
 * 2. 如果可以使用字符串处理函数完成的任务，就不要使用正则
 * 3. 有一些复杂的操作，只能使用正则完成。
 *
 * 正则表达式可以在很多计算机语言中应用
 *
 *  4. 正则表达式也称为一种模式表达式。
 *  5.正则表达式就是通过构建具有特定规则的模式，与输入的字符信息比较。再进行分割、匹配、查找、替换等工作
 *
 *    "/\<img\s*src=\".*?\"\/\>/"
 *
 *    一、正则表达式也是一个字符串
 *    二、由具有特殊意义的字符组成的字符串
 *    三、具有一点编写规则，也是一种模式
 *    四、看作是一种编程语言（是用一些特殊字符，按规则编写出一个字符串，形成一种模式---正则表达式）
 *
 *
 *    注意： 如果正则表达式，不和函数一起使用，则它就是一个字符串，如果将正则表达式放到到某个函数中使用， 才能发挥出正则表达式的作用。
 *
 *     用到分割函数中，就可以用这个正则去分割字符串
 *     用到替换函数中，就可以用这个正则去替换字符串
 *     ...
 *
 *	在PHP中给我们提供两套正则表达式函数库
	POSIX 扩展正则表达式函数（ereg_）
	Perl 兼容正则表达式函数(preg_)

	这个函数功能一样， 找一个处理字符串效率高的

	注意：推荐使用Perl 兼容正则表达式函数库（只学这一种）



	学习正则表达式时，有两方面需要学习：

	一、正则表达式的模式如何编写
	语法：
		1. 定界符号  //
			除了字母、数字和正斜线\ 以外的任何字符都可以为定界符号
			| |
			/ /
			{ }
			! !

			没有特殊需要，我们都使用正斜线作为正则表达式的定界符号


		2. 原子   img \s .
			注意：原子是正则表达式的最基本组成单位，而且必须至少要包含一个原子
			只要一个正则表达式可以单独使用的字符，就是原子

			1. 所有打印（所有可以在屏幕上输出的字符串）和非打印字符（看不到的）
			2. \. \* \+ \? \( \<\> 如果所有有意义的字符，想作为原子使用，统统使用 ”\“转义字符转义 m
				" \ "转义字符可以将有意的字符转成没意义的字符，还可以将没意义的字符转为有意义的字符
			3. 在正则表达式中可以直接使用一些代表范围的原子
				\d  : 表示任意一个十进制的数字       [0-9]
				\D  : 表示任意一个除数字这外的字符   [^0-9]
				\s  : 表示任意一个空白字符，空格、\n\r\t\f   [\n\r\t\f ]
				\S  : 表示任意一个非空白                     [^\n\r\t\f ]
				\w  : 表示任意一个字 a-zA-Z0-9_              [a-zA-Z_]
				\W  : 表示任意一个非字， 除了a-zA-Z0-9_以外的任意一个字符  [^a-zA-Z0-9_]
			4. 自己定义一个原子表[], 可以匹配方括号中的任何一个原子
				[a-z5-8]
				[^a-z] 表示取反， 就是除了原子表中的原子，都可以表示(^必须在［］内的第一个字符处出现)

			.


		3. 元字符  * ?
			元字符是一种特殊的字符，是用来修饰原子用的，不可以单独出现
			*  : 表示其前的原子可以出现 0次、1次、或多次                       {0,}
			+  : 表示其前的原子可以出现1次 或多次， 不能没有最少要有一个       {1,}
			?  ： 表示其前面的原子可以出现0次或1次， 有只能有一次，要么没有    {0,1}
			{} : 用于自己定义前面原子出现的次数
				{m}   //m表示一个整数， {5}表示前面的原子出现5次
				{m,n}  //m和n表示一个整数，{2,5} m要小于n, 表示前面出现的原子，最少m次，最多n次，包括m和n次
				{m,}   //表示前面的原子最少出现m次,最多无限

			.   : 默认情况下，表示除换行符外任意一个字符
			^   : 直接在一个正则表达式的第一个字符出现，则表达必须以这个正则表达式开始
			$   : 直接在一个正则表达式的最后一个字符出现，则表达必须以这个正则表达式结束
			|   : 表示或的关系 , 它的优先级号是最低的， 最后考虑它的功能

			\b  : 表示一个边界
			\B  ： 表示一个非边界

			()  : 重点

			一、 () 作用： 是作为大原子使用
			二、 改变优先级,加上括号可以提高优先级别
			三、 作为子模式使用, 正则表达式不先对一个字符串匹配一次, 全部匹配作为一个大模式，放到数组的第一个元素中，每个()是一个子模式按顺序放到数组的其它元素中去。
			四、可以取消子模式，就将（）作为大原子或改变优先级使用, 在括号中最前面使用"?:"就可以取消这个（）表示的子模式
			五、反向引用， 可以在模式中直接将子模式取出来，再作为正则表达式模式的一部分， 如果是在正则表达式像替换函数preg_replace函数中， 可以将子模式取出， 在被替换的字符串中使用

			\1 取第一个子模式、 \2取第二个子模式， ....  \5 (注意是单引号还是双引号引起来的正则)

			"\\1"
			'\1'

			${1} ${2}

			\* \+ \. \?

			\
			() (?:) []
			* + ? {}
			^  $   \b
			|

		4. 模式修正符号	 i u
			"/ /模式修正符"
			1. 就是几个字母
			2. 可以一次使用一个，每一个具一定的意义， 也可以连续使用多个
			3. 是对整个正则表达式调优使用， 也可以说是对正则表达式功能的扩展

			"/abc/" 只能匹配小写字母 abc
			"/abc/i" 可以不区分大小写匹配 ABC abc Abc ABc AbC

		i : 表示在和模式进行匹配进不区分大小写
		m : 默认情况，将字符串视为一行  ^  $ 视为多行后，任何一行都可以以正则开始或结束
		s : 如果没有使用这个模式修正符号时， 元字符中的"."默认不能表示换行符号,将字符串视为单行
		x : 表示模式中的空白忽略不计
		e : 正则表达式必须使用在preg_replace替换字符串的函数中时才可以使用(讲这个函数时再说)
		A :
		Z :
		U : 正则表达式的特点：就是比较”贪婪“  .* .+ 所有字符都符合这个条件
*/


class pregDemo {

}