$(function() {
	$(".js-example-placeholder-single").select2({
		placeholder: "节 点"
	});
});

$(function() {
	$(".js-example-placeholder-single2").select2({
		placeholder: "标 签"
	});
});

//reply
function replyOne(username){
	replyContent = $("#reply_content");
	oldContent = replyContent.val();
	prefix = "@" + username + " ";
	newContent = ''
	if(oldContent.length > 0){
		if (oldContent != prefix) {
			newContent = oldContent + "\n" + prefix;
		}
	} else {
		newContent = prefix
	}
	replyContent.focus();
	replyContent.val(newContent);
	moveEnd($("#reply_content"));
}

var moveEnd = function(obj){
  obj.focus();

  var len = obj.value === undefined ? 0 : obj.value.length;

  if (document.selection) {
    var sel = obj.createTextRange();
    sel.moveStart('character',len);
    sel.collapse();
    sel.select();
  } else if (typeof obj.selectionStart == 'number' && typeof obj.selectionEnd == 'number') {
    obj.selectionStart = obj.selectionEnd = len;
  }
}