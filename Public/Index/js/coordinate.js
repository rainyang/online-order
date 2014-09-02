
        
   
        window.g = {};
        window.d = function(id) { return document.getElementById(id) };
        window.onload = function() {
            if (GBrowserIsCompatible()) {

                g.map = new GMap2(d("map"));
                g.map.addControl(new GLargeMapControl());
                g.map.addControl(new GMapTypeControl());
                g.map.addControl(new GScaleControl());

                g.geocoder = new GClientGeocoder();

                g.getCoordinates = function(address) {
                    g.geocoder.getLatLng(
                    address,
                    function(point) {
                        if (point) {
                            g.map.setCenter(point, 13);
                            var marker = new GMarker(point);
                            g.map.addOverlay(marker);
                            var info =  point.lat() + "," + point.lng();
                            //alert(info);return;

                            d("coordinate").value = info;
                            marker.openInfoWindowHtml(info);
                            marker.__address_info = info;
                            GEvent.addListener(marker, "click", function() {
                                g.map.setCenter(this.getLatLng());
                                this.openInfoWindowHtml(this.__address_info);
                                d("coordinate").value = info;
                                
                            });
                        }
                        
                    }
                )
                }

                d("btn_go").onclick = function() {
                    g.getCoordinates(d("address").value);
                }
                d("btn_go").onclick();
            }
            else {
                alert('不支持的浏览器');
            }
        }
        /*window.onunload = function() {
            GUnload();
        }*/
