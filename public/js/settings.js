var Settings = function() {
	this.rootURL = '/index.php/';
	if (this.rootURL === "/")
		this.rootURL = "";
};

Settings.Instance = undefined;
Settings.getInstance = function() {
	if (Settings.Instance === undefined)
		Settings.Instance = new Settings();
	return Settings.Instance;
};