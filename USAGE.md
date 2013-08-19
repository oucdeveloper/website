项目Git说明
===========
		更新者：栾尚聪

一、初次请克隆项目并设置项目环境
-------
		1、进入/var/www目录，确保该目录下没有website文件或目录
		2、设置项目开发者标识信息：
		   sudo git config --global user.name <Your Name>
		   sudo git config --global user.email <you@email.address>
		   *以下是我的设置：
		   sudo git config --global user.name "Shangcong Luan"
		   sudo git config --global user.email hikerell@gmail.com
		3、克隆项目：sudo git clone https://github.com/oucdeveloper/website.git
		4、生成ssh密钥对，建议将公私钥保存在/root/.ssh/目录下（省去push和pull某些麻烦）
		   ssh-keygen -C <you@email.address> -t rsa
                   sudo cp ~/.ssh/id_rsa\* /root/.ssh/
		   *以下是我的设置：
		   ssh-keygen -C 'hikerell@gmail.com' -t rsa
                   sudo cp ~/.ssh/id_rsa\* /root/.ssh/
		5、登录github，上传公钥：
		   'Account Setting'->'SSH Keys'->'Add SSH key'
		   *Title填写自己的名字
		   *Key复制上公钥内容
		6、测试SSH可用性：
		   ssh -v git@github.com
		   若没有Error信息即已可用
		7、命名项目为origin
		   sudo git remote add origin git@github.com:oucdeveloper/website.git

二、推送更新到远程版本库（PUSH同步）
-----------------------------------
		比如新建了index.php或修改了上一版本的index.phpi（新建或修改目录类似）:
		sudo git add index.php
		sudo git commit -m '修改说明'

		sudo git push origin master
		输入github用户名和密码后没有Fail信息即成功

三、更新本地版本库（PULL同步）
-----------------------------
		每次准备在本地更新源码时请先PULL同步一下
		sudo git pull --rebase origin master

* 什么时候PULL和PUSH？
----------------------
		更改了项目的结构（包括文件、目录），就应该尽快PUSH推送更新
		每次开始工作前都应该同步一下，以免自己的修改和别人冲突或者别人做了结构性的调整和自己的修改不协调了

* 相关阅读
		《Github使用指南》(https://github.com/yfwz100/neuola/wiki/github%E4%BD%BF%E7%94%A8%E6%8C%87%E5%8D%97)
		《github快速使用指南—git学习笔记》(http://www.36ria.com/4742)
