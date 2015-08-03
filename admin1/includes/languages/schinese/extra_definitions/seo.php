<?php
define('SEO_CONFIGURATION_GROUP_TITLE', '网址优化');
define('SEO_CONFIGURATION_GROUP_DESCRIPTION', '网址优化选项');

define('USU_VERSION_TITLE', SEO_CONFIGURATION_GROUP_TITLE . '版本');
define('USU_VERSION_DESCRIPTION', '已安装版本');

define('SEO_ENABLED_TITLE', '启用网址优化吗?');
define('SEO_ENABLED_DESCRIPTION', '全局控制开启还是关闭网址优化模块。');
define('SEO_URL_END_TITLE', '网址重写后缀');
define('SEO_URL_END_DESCRIPTION', '在这里输入网址重写后的后缀。例如 \'.html\', \'.htm\', 也可以留空');
define('SEO_URL_CPATH_TITLE', '生成 cPath 参数');
define('SEO_URL_CPATH_DESCRIPTION', 'Zen Cart 默认在产品页面使用 cPath 参数，用以保证链接产品在相应的分类。自动模式下，如果不需要可以删除 cPath。');
define('SEO_URL_FORMAT_TITLE', '重写网址的格式');
define('SEO_URL_FORMAT_DESCRIPTION', '选择一种格式。<br /><b>Original:</b><br /><i>Categories:</i> category-name-c-34<br /><i>Products:</i> product-name-p-54<br /><br /><b>Category Parent:</b><br /><i>Categories:</i> parent-category-name-c-34<br /><i>Products:</i> parent-product-name-p-54');
define('SEO_URL_CATEGORY_DIR_TITLE', '显示分类为目录');
define('SEO_URL_CATEGORY_DIR_DESCRIPTION', '选择一种格式。<br /><b>Off:</b> 禁用显示分类为目录<br /><br /><b>Short:</b> 使用\'重写网址的格式\'的设置<b>Full:</b> 使用完整的分类路径<br /><br />');
define('SEO_URLS_FILTER_PCRE_TITLE', '输入网址的 PCRE 过滤规则');
define('SEO_URLS_FILTER_PCRE_DESCRIPTION', 'This setting uses PCRE rules to filter generated urls.<br><br>The format <b>MUST</b> be in the form: <b>find1=>replace1,find2=>replace2</b>. This filter is run before character conversions and stripping of special characters. If you want a dash - in your URLS, use a single space. Also note you must double escape back slashes.');
define('SEO_URLS_FILTER_CHARS_TITLE', '输入特殊字符转换');
define('SEO_URLS_FILTER_CHARS_DESCRIPTION', 'This setting will replace a single byte character with another single byte character.<br><br>The format <b>MUST</b> be in the form: <b>char=>conv,char2=>conv2</b>');
define('SEO_URLS_REMOVE_CHARS_TITLE', '网址中排除的字符');
define('SEO_URLS_REMOVE_CHARS_DESCRIPTION', 'This allows you remove certain problematic characters from the generated URLs.<br /><br /><i>non-alphanumerical:</i> removes all non-alphanumerical characters<br /><i>punctuation:</i> removes all punctuation characters');
define('SEO_URLS_FILTER_SHORT_WORDS_TITLE', '过滤太短的单词');
define('SEO_URLS_FILTER_SHORT_WORDS_DESCRIPTION', 'This setting will filter words less than or equal to the value from the URL.');
define('SEO_URLS_USE_W3C_VALID_TITLE', 'Output W3C valid URLs (parameter string)?');
define('SEO_URLS_USE_W3C_VALID_DESCRIPTION', 'This setting will force the output of W3C valid URLs.');
define('SEO_REWRITE_TYPE_TITLE', '选择网址重写引擎');
define('SEO_REWRITE_TYPE_DESCRIPTION', '选择使用的网址优化引擎。');
define('SEO_URLS_ONLY_IN_TITLE', '输入允许重写的页面');
define('SEO_URLS_ONLY_IN_DESCRIPTION', 'You can limit the pages which will be rewritten by specifying them here. If no pages are specified all pages will be rewritten. <br><br>The format is comma delimited and <b>MUST</b> be in the form: <b>page1,page2,page3</b> or <b>page1, page2, page3</b>');
define('SEO_USE_CACHE_GLOBAL_TITLE', '启用网址优化缓存减少查询次数?');
define('SEO_USE_CACHE_GLOBAL_DESCRIPTION', '全局设置开关缓存。');
define('SEO_USE_CACHE_PRODUCTS_TITLE', '启用产品缓存?');
define('SEO_USE_CACHE_PRODUCTS_DESCRIPTION', '开关产品缓存。');
define('SEO_USE_CACHE_CATEGORIES_TITLE', '启用分类缓存?');
define('SEO_USE_CACHE_CATEGORIES_DESCRIPTION', '开关分类缓存。');
define('SEO_USE_CACHE_MANUFACTURERS_TITLE', '启用厂家缓存?');
define('SEO_USE_CACHE_MANUFACTURERS_DESCRIPTION', '开关厂家缓存。');
define('SEO_USE_CACHE_EZ_PAGES_TITLE', '启用简易页面缓存?');
define('SEO_USE_CACHE_EZ_PAGES_DESCRIPTION', '开关简易页面缓存。');
define('SEO_USE_REDIRECT_TITLE', '启用自动转向?');
define('SEO_USE_REDIRECT_DESCRIPTION', '旧网址到新网址自动跳转，发送 301 页头。');
define('SEO_URLS_CACHE_RESET_TITLE', '重置网址优化缓存');
define('SEO_URLS_CACHE_RESET_DESCRIPTION', '重置网址优化的缓存数据。');

define('SEO_INSTALL_SUCCESS', SEO_CONFIGURATION_GROUP_TITLE. ' 安装完成!');
define('SEO_INSTALL_ERROR', SEO_CONFIGURATION_GROUP_TITLE. ' 安装失败!');
define('SEO_UNINSTALL_SUCCESS', SEO_CONFIGURATION_GROUP_TITLE. ' 删除完成!');
define('SEO_UNINSTALL_ERROR', SEO_CONFIGURATION_GROUP_TITLE. ' 删除失败!');
define('SEO_INSTALL_ERROR_AUTOLOAD', '自动加载文件 \'%s\' 未删除。必须手动删除这个文件后才能使用本模块。在论坛发帖寻求帮助前，请先执行这个操作。');
define('SEO_INSTALL_ERROR_FILE_NOT_FOUND', '文件系统错误: 无法访问 \'%s\'。请检查已上传这个文件，且服务器可以访问!');
define('SEO_INSTALL_ERROR_FILE_FOUND', '文件 \'%s\' 未删除，请手动删除文件。在论坛发帖寻求帮助前，请先执行这个操作。');
define('SEO_INSTALL_ERROR_SORT_ORDER', '数据库错误: 无法访问 sort_order，位于表 \'%s\'!');
define('SEO_UNINSTALL_ERROR_DELETE', '数据库错误: 无法删除 \'%s\'，位于表 \'%s\'!');
define('SEO_UNINSTALL_ERROR_TABLE', '数据库错误: 无法删除表 \'%s\'!');
define('SEO_UNINSTALL_ERROR_ADMIN_PAGES', '无法删除注册的管理页面');

define('SEO_CONFIG_ADJUSTED', 'Due to the setting you have selected for \'%s\'<br />the option for \'%s\' was changed to \'%s\'!');
