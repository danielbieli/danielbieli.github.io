/*!
 * Online Editor
 * @author Natan Felles <natanfelles@gmail.com>
 */

var hello = '  ___        _ _              _____    _ _ _             \n'
	+ ' / _ \\ _ __ | (_)_ __   ___  | ____|__| (_) |_ ___  _ __ \n'
	+ '| | | | \'_ \\| | | \'_ \\ / _ \\ |  _| / _` | | __/ _ \\| \'__|\n'
	+ '| |_| | | | | | | | | |  __/ | |__| (_| | | || (_) | |   \n'
	+ ' \\___/|_| |_|_|_|_| |_|\\___| |_____\\__,_|_|\\__\\___/|_|   \n\n'
	+ 'by @natanfelles';
console.log(hello);
ace.require("ace/ext/language_tools");
var editor = ace.edit("editor");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/php");
editor.setOptions({
	enableBasicAutocompletion: true,
	enableSnippets: true,
	enableLiveAutocompletion: true
});
document.getElementById("editor").style.fontSize = "16px";
editor.$blockScrolling = Infinity;
editor.getSession().setUseWrapMode(true);
editor.getSession().setUseSoftTabs(true);
editor.getSession().setTabSize(4);

function saveTextAsFile() {
	var textToWrite = editor.getValue();
	var textFileAsBlob = new Blob([textToWrite], {
		type: "text/plain"
	});
	var fileNameToSaveAs = document.getElementById("filename").value;
	var downloadLink = document.createElement("a");
	downloadLink.download = fileNameToSaveAs;
	downloadLink.innerHTML = "Download File";
	if (window.webkitURL != null) {
		downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
	} else {
		downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
		downloadLink.onclick = destroyClickedElement;
		downloadLink.style.display = "none";
		document.body.appendChild(downloadLink);
	}
	downloadLink.click();
}

function destroyClickedElement(event) {
	document.body.removeChild(event.target);
}

function loadFileAsText() {
	var fileToLoad = document.getElementById("loadfile").files[0];
	var fileReader = new FileReader();
	fileReader.onload = function (fileLoadedEvent) {
		var textFromFileLoaded = fileLoadedEvent.target.result;
		editor.setValue(textFromFileLoaded);
		document.getElementById("filename").value = document.getElementById("loadfile").value;
	};
	fileReader.readAsText(fileToLoad, "UTF-8");
}
$(".dropdown-menu a").click(function () {
	$(".dropdown-menu a").removeClass("active");
	$(this).addClass("active");
});