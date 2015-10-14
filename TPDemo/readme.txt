ThinkPHP 测试代码

  一、普通查询方式
        a、字符串
        $arr=$m->where("sex=0 and username='gege'")->find();
        b、数组
        $data['sex']=0;
        $data['username']='gege';
        $arr=$m->where($data)->find();
        注意：这种方式默认是and的关系，如果使用or关系，需要添加数组值
        $data['sex']=0;
        $data['username']='gege';
        $data['_logic']='or';
  二、表达式查询方式
        $data['id']=array('lt',6);
        $arr=$m->where($data)->select();
        EQ 等于
        NEQ不等于
        GT 大于
        EGT大于等于
        LT 小于
        ELT小于等于
        LIKE 模糊查询
        $data['username']=array('like','%ge');
        $arr=$m->where($data)->select();
        NOTLIKE
        $data['username']=array('notlike','%ge%'); //notlike中间没有空格
        $arr=$m->where($data)->select();

        注意：如果一个字段要匹配多个通配符
        $data['username']=array('like',array('%ge%','%2%','%五%'),'and');//如果没有第三个值，默认关系是or关系
        $arr=$m->where($data)->select();
        BETWEEN
        $data['id']=array('between',array(5,7));
        $arr=$m->where($data)->select();
        //SELECT * FROM `tp_user` WHERE ( (`id` BETWEEN 5 AND 7 ) )
        $data['id']=array('not between',array(5,7));//注意，not 和 between中间一定要有空格
        $arr=$m->where($data)->select();
        IN
        $data['id']=array('in',array(4,6,7));
        $arr=$m->where($data)->select();
        //SELECT * FROM `tp_user` WHERE ( `id` IN (4,6,7) )

        $data['id']=array('not in',array(4,6,7));
        $arr=$m->where($data)->select();
        //SELECT * FROM `tp_user` WHERE ( `id` NOT IN (4,6,7) )

    三、区间查询
		$data['id']=array(array('gt',4),array('lt',10));//默认关系是 and 的关系
		//SELECT * FROM `tp_user` WHERE ( (`id` > 4) AND (`id` < 10) )

		$data['id']=array(array('gt',4),array('lt',10),'or') //关系就是or的关系

		$data['name']=array(array('like','%2%'),array('like','%五%'),'gege','or');

	    四、统计查询
    		count //获取个数
    		max   //获取最大数
    		min   //获取最小数
    		avg   //获取平均数
    		sum   //获取总和

        五、SQL直接查询
            a、query 主要数处理读取数据的
                成功返回数据的结果集
                失败返回boolean false
                $m=M();
                $result=$m->query("select *  from t_user where id >50");
                var_dump($result);
            b、execute 用于更新个写入操作
                成功返回影响行数
                失败返回boolean false
                $m=M();
                $result=$m->execute("insert into t_user(`username`) values('ztz3')");
                var_dump($result);

一、导入CSS和JS文件
	1、css link
	   js  scr
		<link rel='stylesheet' type='text/css' href='__PUBLIC__/Css/test.css'/>
		<script src='__PUBLIC__/Js/test.js'></script>
	2.import
		<import type='js' file='Js.test' /> //导入Public文件夹下面的Js目录中的test.js文件，import标签可以省略type属性，默认就是js的
		<import type='css' file='Css.test' />
		//可以更改默认文件夹 设置basepath属性
		<import type='js' file='Js.my' basepath='./Other'/>
	3.load
		//方法可以自动检测导入的文件类型
		<load href='__PUBLIC__/Js/test.js' />
二、分支结构
	1、if
		<if condition='$sex eq "男"'>
			男人是泥巴做的
			<else />
			女人是水做的
		</if>

		<if condition='$age lt 18'>
			未成年
			<elseif  condition='$age eq 18'/>
			青春年少
			<else />
			成年
		</if>
		>  gt
		<  lt
		== eq
		<= elt
		>= egt
		!= neq
		=== heq
		!== nheq

		<switch name='number'>
			<case value='1'>一个和尚挑水吃</case>
			<case value='2'>两个和尚台水吃</case>
			<case value='3'>三个和尚没水吃</case>
			<default/> 这里是默认值
		</switch>
三、循环结构
	1.for
		<table border='1' width='500'>
			<for start='10' end='00' name='j' step='-2' comparison='gt'>
				<tr><td>{$j}</td><td>abc</td></tr>
			</for>
		</table>

	2.volist
		<volist name='list' id='v'>
			{$v.username}<br/>
		</volist>
	3.foreach
		<foreach name='list' item='v' key='k'>
			{$k}-------{$v}<br/>
		</foreach>
四、特殊标签
	1、比较标签
			eq或者 equal 等于
			neq 或者notequal 不等于
			gt 大于
			egt 大于等于
			lt 小于
			elt 小于等于
			heq 恒等于
			nheq 不恒等于

	2.范围标签
		in
				<in name='n' value='9,10,11,12'>在这些数字里面<else/>不在这些数字的范围内</in>
				<notin name='n' value='9,10,11,12'>在这些数字里面<else/>不在这些数字的范围内</in>
		between
				<notbetween name='n' value='1,10'>{$n}在1-10之间<else/>{$n}不在1到10之间</between>
	3.present
		标签来判断模板变量是否已经赋值，
		<present name='m'>m有赋值<else/>m没有赋值</present>
	4.Empty
		empty标签判断模板变量是否为空，
		<empty name='n'>n为空赋值<else/>n有值</empty>
	5.Defined
		判断常量是否已经定义
	6.Define
		在模板中定义常量
	7.Assing
		模板中变量赋值


五、其他标签使用
	1、在模板中直接使用PHP代码
		<php> echo "我是赵桐正" </php>
	2、建议更改左右定界符
		在配置文件中改变
			'TMPL_L_DELIM'=>'<{', //修改左定界符
			'TMPL_R_DELIM'=>'}>', //修改右定界符


一、模板包含
		<include file="完整模板文件名" />
		<include file="./Tpl/default/Public/header.html" />
		<include file="read" />
		<include file="Public:header" />
		<include file="blue:User:read" />
		<include file="$tplName" />
		<include file="header" title="ThinkPHP框架"keywords="开源WEB开发框架"/>
		在模板中变量用[变量]接受
		<include file='file1,file2' />
二、模板渲染
	1、自动开启模板渲染 设置配置文件
			'LAYOUT_ON'=>true,//开启模板渲染
			准备一个模板渲染页面，在页面中使用{__CONTENT__}接受具体模板页面的内容
			如果在摸一个具体模板中不希望使用渲染模板，可以在页首添加{__NOCONTENT__}
	2、不开启自动模板渲染可以在每一个具体页面的页首添加
		<layout name='layout'/>
	3.使用技巧
		在渲染模板文件中也可以使用其他模板文件的内容
		<include file='Public:header'/>
		<body>
			<p>这里是渲染页面！！！</p>
			{__CONTENT__}
		</body>
	</html>