$(function () {
    $("input").inputTip();  // 调用inputTip方法
    $("input[type='button']").focus();  // 页面打开后焦点置于button上，也可置于别处。否则IE上刷新页面后焦点在第一个输入框内造成placeholder文字后紧跟光标现象
});

var funPlaceholder = function(element) {
    //检测是否需要模拟placeholder
    var placeholder = '';
    if (element && !("placeholder" in document.createElement("input")) && (placeholder = element.getAttribute("placeholder"))) {
        //当前文本控件是否有id, 没有则创建
        var idLabel = element.id ;
        if (!idLabel) {
            idLabel = "placeholder_" + new Date().getTime();
            element.id = idLabel;
        }

        //创建label元素
        var eleLabel = document.createElement("label");
        eleLabel.htmlFor = idLabel;
        eleLabel.style.position = "absolute";
        //根据文本框实际尺寸修改这里的margin值
        eleLabel.style.margin = "2px 0 0 3px";
        eleLabel.style.color = "graytext";
        eleLabel.style.cursor = "text";
        //插入创建的label元素节点
        element.parentNode.insertBefore(eleLabel, element);
        //事件
        element.onfocus = function() {
            eleLabel.innerHTML = "";
        };
        element.onblur = function() {
            if (this.value === "") {
                eleLabel.innerHTML = placeholder;  
            }
            //checkValue(this);
        };

        //样式初始化
        if (element.value === "") {
            eleLabel.innerHTML = placeholder;   
        }
    }   
};
// funPlaceholder(document.getElementById("pc_thing_name","ls_thing_name"));
funPlaceholder(document.getElementById("pc_thing_name"));
funPlaceholder(document.getElementById("ls_thing_name"));
funPlaceholder(document.getElementById("pc_place"));
funPlaceholder(document.getElementById("ls_place"));
funPlaceholder(document.getElementById("pc_datetime"));
funPlaceholder(document.getElementById("ls_datetime"));
funPlaceholder(document.getElementById("pc_contact"));
funPlaceholder(document.getElementById("ls_contact"));
funPlaceholder(document.getElementById("username"));
funPlaceholder(document.getElementById("password"));


