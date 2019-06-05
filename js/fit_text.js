var fitTxtBox = {
  init: function() {
    _t = this;
    _t.box = $('.fit-box');
    _t.txt = $('.fit-box-text');
    _t.checkFit();
    _t.timer;

    $(window).resize(function() {
      if (_t.timer) {
        clearTimeout(_t.timer);
      }
      _t.timer = setTimeout(function() {
        _t.checkFit();
      }, 10);
    });
  },
  checkFit: function() {
    fontSize = parseInt(_t.txt.css('font-size'));
    if (_t.txt.outerWidth() - _t.box.width() > 10) {
      _t.txt.css({
        fontSize: fontSize - 1 + 'px'
      });
        _t.checkFit();
    } else if (_t.box.width() - _t.txt.outerWidth() > 70) {
      _t.txt.css({
        fontSize: fontSize + 1 + 'px'
      });
        _t.checkFit();
    }
  }
}

fitTxtBox.init();