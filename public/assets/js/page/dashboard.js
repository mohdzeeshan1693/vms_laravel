$(function () {
    "use strict";

    $(".counter").counterUp({
        delay: 10,
        time: 1000,
    });

    // Total Purchased Tender
    var chart = c3.generate({
        bindto: "#totalPurchasedTender", // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ["awarded", 27],
                ["unawarded", 73],
            ],
            type: "donut", // default type of chart
            colors: {
                awarded: "#44b39b",
                unawarded: "#ff7f81",
            },
            names: {
                // name of each serie
                awarded: "Awarded",
                unawarded: "Unawarded",
            },
        },
        donut: {
            title: "124,301 SAR",
        },
        axis: {},
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: 10,
            top: 0,
        },
    });

    // Total Tender Per City
    var chart = c3.generate({
        bindto: "#totalTenderPerCity", // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ["awardedData", 11, 8, 15, 18, 1, 17, 11, 8, 15, 18, 1, 17, 10],
                [
                    "unawardedData",
                    22,
                    3,
                    25,
                    27,
                    17,
                    18,
                    22,
                    3,
                    25,
                    27,
                    17,
                    18,
                    15,
                ],
            ],
            type: "bar", // default type of chart
            colors: {
                awardedData: "#1b6079",
                unawardedData: "#fed284",
            },
            names: {
                // name of each serie
                awardedData: "Awarded",
                unawardedData: "Unawarded",
            },
        },
        axis: {
            x: {
                type: "category",
                // name of each category
                categories: [
                    "Makkah",
                    "Riyadh",
                    "Dammam",
                    "Abha",
                    "Jazan",
                    "Madinah",
                    "Buraidah",
                    "Tabuk",
                    "Hail",
                    "Najran",
                    "Sakaka",
                    "AlBaha",
                    "Arar",
                ],
                tick: {
                    multiline: false,
                },
            },
        },
        bar: {
            width: {
                ratio: 0.5, // this makes bar width 50% of length between ticks
            },
        },
        legend: {
            show: true, //hide legend
        },
        padding: {
            bottom: 15,
            top: 0,
        },
    });

    // Positions
    var chart = c3.generate({
        bindto: "#positionsBar", // id of chart wrapper
        data: {
            columns: [
                // each columns data
                ["data1", 11, 8, 15, 18, 19],
            ],
            type: "bar", // default type of chart
            colors: {
                data1: "#34738a",
            },
            names: {
                // name of each serie
                data1: "Maximum",
            },
        },
        axis: {
            x: {
                type: "category",
                // name of each category
                categories: [
                    "1st Position ",
                    "2nd Position",
                    "3rd Position",
                    "4th Position",
                    "5th Position",
                ],
            },
            rotated: true,
        },
        bar: {
            width: {
                ratio: 0.5, // this makes bar width 50% of length between ticks
            },
        },
        legend: {
            show: false, //hide legend
        },
        padding: {
            bottom: 0,
            top: 0,
        },
    });

    // Upcoming Tenders
    var months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sept",
        "Oct",
        "Nov",
        "Dec",
    ];

    var currentDate = new Date();

    var currentDatePlus60 = new Date();
    currentDatePlus60.setDate(currentDatePlus60.getDate() + 59);

    // Returns an array of dates between the two dates
    var getDates = function (startDate, endDate) {
        var dates = [],
            currentDate = startDate,
            addDays = function (days) {
                var date = new Date(this.valueOf());
                date.setDate(date.getDate() + days);
                return date;
            };
        while (currentDate <= endDate) {
            dates.push(
                months[currentDate.getMonth()] + " " + currentDate.getDate()
            );
            currentDate = addDays.call(currentDate, 1);
        }
        return dates;
    };

    // Usage
    var dates = getDates(currentDate, currentDatePlus60);

    var chart = c3.generate({
        bindto: "#upcomingTenders", // id of chart wrapper
        data: {
            columns: [
                // each columns data
                [
                    "data1",
                    1,
                    2,
                    null,
                    43,
                    null,
                    null,
                    60,
                    null,
                    null,
                    20,
                    null,
                    null,
                    null,
                    null,
                    null,
                    76,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    null,
                    45,
                    26,
                    57,
                    null,
                    29,
                    null,
                    31,
                    72,
                    null,
                    54,
                    null,
                    null,
                    null,
                    null,
                    49,
                    null,
                    null,
                    null,
                    23,
                    null,
                    null,
                    null,
                    null,
                    null,
                    69,
                    50,
                    null,
                    null,
                    null,
                    40,
                    null,
                    86,
                    57,
                    null,
                    59,
                    60,
                ],
            ],
            type: "scatter", // default type of chart
            colors: {
                data1: "#34738a",
            },
            names: {
                // name of each serie
                data1: "Value",
            },
        },
        axis: {
            x: {
                type: "category",
                // name of each category
                categories: dates,
                tick: {
                    rotate: -70,
                    multiline: false,
                },
                height: 40,
            },
            y: {
                tick: {
                    format: function (d) {
                        return d + "M";
                    },
                },
            },
        },
        legend: {
            show: false, //hide legend
        },
        point: {
            r: 5,
        },
        padding: {
            bottom: 0,
            top: 0,
        },
    });
});
