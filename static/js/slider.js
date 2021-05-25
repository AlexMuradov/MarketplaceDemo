; (function ($, window, document, undefined) {
    var pluginName = "histogramSlider",
        dataKey = "plugin_" + pluginName;

    var updateHistogram = function (selectedRange, sliderMin, rangePerBin, histogramName, sliderName, itemsCount) {
        var leftValue = selectedRange[0],
            rightValue = selectedRange[1];

        $("#" + sliderName + "-value_start").val(leftValue);
        $("#" + sliderName + "-value_end").val(rightValue);

        // set opacity per bin based on the slider values
        $("#" + histogramName + " .in-range").each(function (index, bin) {
            var binRange = getBinRange(rangePerBin, index, sliderMin);
            // console.log(binRange[1] + "---" + binRange[0]  + " --- " +  rightValue + "---" + bin);
            if (binRange[1] < rightValue) {
                // Set opacity based on left (min) slider
                if (leftValue > binRange[1]) {
                    setOpacity(bin, 0);
                } else if (leftValue < binRange[0]) {
                    setOpacity(bin, 1);
                } else {
                    //setOpacity(bin, 1);
                    setOpacity(bin, 1 - (leftValue - binRange[0]) / rangePerBin);
                }
            } else if (binRange[0] > leftValue) {
                // Set opacity based on right (max) slider value
                if (rightValue > binRange[1]) {
                    setOpacity(bin, 1);
                } else if (rightValue < binRange[0]) {
                    setOpacity(bin, 0);
                } else {
                    //setOpacity(bin, 1);
                    setOpacity(bin, (rightValue - binRange[0]) / rangePerBin);
                }
            }
        });
    };

    var getBinRange = function(rangePerBin, index, sliderMin) {
        var min = (rangePerBin * index + sliderMin),
            max = rangePerBin * (index + 1) + sliderMin;
        return [min, max]; 
    }

    var setOpacity = function(bin, val) {
        $(bin).css("opacity", val);
    };

    var convertToHeight = function (v) {
        if (v < 20) {
            return parseInt(10 * v + 1);
        }
        else return parseInt(5 * v + 1);
    }

    var calculateHeightRatio = function(bins, histogramHeight, length) {
        var maxValue = Math.max.apply(null, bins);
        var height = convertToHeight(maxValue, length);
        // console.log("maxValue : "  + maxValue);
        // console.log("histogramHeight : "  + histogramHeight);
        if (height > histogramHeight) {
            return histogramHeight / height;
        }
        return 1;
    }

    var calculateItemsCount = function(values, data) {
        var min = data.findIndex(element => element >= values[0]);
        var max = data.length  - data.reverse().findIndex(element => element <= values[1]);
        
        data.reverse();
        return max - min
    }

    var Plugin = function (element, options) {
        this.element = element;

        this.options = {
            sliderRange: [0, 1000000], // Min and Max slider values
            optimalRange: [0, 0], // Optimal range to select within
            selectedRange: [0, 0], // Min and Max slider values selected
            height: 200,
            numberOfBins: 40,
            showTooltips: false,
            showSelectedRange: false,
            rangePerBin: 10,
            pureData: null
        };
        this.init(options);
    };

    Plugin.prototype = {
        init: function (options) {
            $.extend(this.options, options);
            
            var self = this,
                dataItems = self.options.data,
                range = parseInt(self.options.sliderRange[1] - self.options.sliderRange[0]),
                rangePerBin = range / this.options.numberOfBins,
                bins = new Array(this.options.numberOfBins + parseInt(self.options.sliderRange[0] / rangePerBin)).fill(0);
                // console.log(parseInt(self.options.sliderRange[0]/rangePerBin));
                for (i = 0; i < dataItems.length; i++) {
                    var index = parseInt(dataItems[i].value / rangePerBin);
                    if (index >= bins.length)
                            index = bins.length - 1;
                    increment = 1;

                bins[index] += increment;
               // console.log("index : " + index + " dataItems : " + dataItems[i].value + " rangePerBin : " + rangePerBin);
            }
            bins = bins.sort(function(a, b){ return b.index - a.index})
            // console.log(bins);
            var histogramName = self.element.attr('id') + "-histogram",
                sliderName = self.element.attr('id') + "-slider";

            var wrapHtml = "<div id='" + histogramName + "' style='height:" + self.options.height + "px;'></div>" +
                "<div id='" + sliderName + "'></div>";

            self.element.html(wrapHtml);
            // var count = calculateItemsCount([self.options.sliderRange[0],self.options.sliderRange[1]], self.options.pureData );
            // console.log("count -" + count );
            // console.log(document.getElementById('histogramSlider-slider-value'));
            // $("#histogramSlider-slider-value").html(self.options.sliderRange[0] + " - " + self.options.sliderRange[1] + " - Listings count : " + count);

            var stBinIndex = returnstartBinIndex();
            function returnstartBinIndex() {
                var st = 0;
                for (var i = 0; i < bins.length; i++) {
                    if (bins[i] !== 0) {
                        st = i;
                        return st;
                    }
                }
            }
            //console.log(stBinIndex);
            var heightRatio = calculateHeightRatio(bins, self.options.height, self.options.pureData.length),
                widthPerBin = 100 / (this.options.numberOfBins);
            
            for (i = stBinIndex; i < bins.length; i++) {

                var binRange = getBinRange(rangePerBin, i, this.options.sliderRangeStart),
                    inRangeClass = "bin-color-selected",
                    outRangeClass = "bin-color";

                if (self.options.optimalRange[0] <= binRange[0] && binRange[0] <= self.options.optimalRange[1]) {
                    inRangeClass = "bin-color-optimal-selected";
                    outRangeClass = "bin-color-optimal";
                }
               
                var toolTipHtml = self.options.showTooltips ? "<span class='tooltiptext'>" + binRange[0] + " - " + binRange[1] + "</br>count: " + bins[i] + "</span>" : "";

                var scaledValue = parseInt(bins[i] * heightRatio),
                    height = convertToHeight(scaledValue),
                    inRangeOffset = parseInt(self.options.height - height),
                    outRangeOffset = -parseInt(self.options.height - height * 2);

                var binHtml = "<div class='tooltip' style='float:left!important;width:" + widthPerBin + "%;'>" +
                    toolTipHtml +
                    "<div class='bin in-range " + inRangeClass + "' style='height:" + height + "px;bottom:-" + inRangeOffset + "px;position: relative;'></div>" +
                    "<div class='bin out-of-range " + outRangeClass + "' style='height:" + height + "px;bottom:" + outRangeOffset + "px;position: relative;'></div>" +
                    "</div>";

                $("#" + histogramName).append(binHtml);
            }
            var ItemsCount = 0;
            
            $("#" + sliderName).slider ({
                range: true,
                min: parseInt(self.options.sliderRangeStart),
                max: parseInt(self.options.sliderRange[1]),
                values: self.options.selectedRange,
                slide: function (event, ui) {

                ItemsCount = calculateItemsCount(ui.values, self.options.pureData);

                updateHistogram(ui.values, self.options.sliderRangeStart, rangePerBin, histogramName, sliderName, ItemsCount);
                }
            });

            if (self.options.showSelectedRange) {
                $("#" + sliderName).after("<div class='histogram_section'><div class='histogram_start histogram_input_block'><p class='histogram_start_text'>мин. цена</p><input id='" + sliderName +"-value_start' class='selected-range histogram_input'></input></div><p class='marg15'> - </p><div class='histogram_end histogram_input_block'><p class='histogram_end_text'>макс. цена</p><input id='" + sliderName +"-value_end' class='selected-range histogram_input'></div></input></div>");
            }
            updateHistogram(self.options.selectedRange, self.options.sliderRangeStart, rangePerBin, histogramName, sliderName, ItemsCount);
        }
    };

    $.fn[pluginName] = function (options) {
        var plugin = this.data(dataKey);

        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    };

}(jQuery, window, document));