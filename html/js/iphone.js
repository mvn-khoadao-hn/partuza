/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

function setTooltip(){
    var inputBox= $(".tooltip");
    var currentValue = inputBox.val();
    var defaultText = inputBox.attr("title");
   
    if(currentValue==""){
        inputBox.val(defaultText);
        inputBox.addClass("tooltipColor");
    }
    else {
        inputBox.removeClass("tooltipColor");
    }
   
    // onblur
    inputBox.bind("blur",function(){
                                      var el = jQuery(this);
                                      if(el.val() == ""){
                                          el.val(defaultText);
                                          el.addClass("tooltipColor");
                                      }
                                      else {
                                          el.removeClass("tooltipColor");
                                      }
                                  });
   
    // onclick
    inputBox.bind("click", function(){
                                        var el = jQuery(this);
                                        if(el.val()==defaultText){
                                            el.val("");
                                            el.removeClass("tooltipColor");
                                        }
                                       
                                    });
    // onfocus
    inputBox.bind("focus", function(){
                                        var el = jQuery(this);
                                        if(el.val()==defaultText){
                                            el.val(""); 
                                            el.removeClass("tooltipColor");
                                        }
                                    });
} 



$(document).ready(function() {
	setTooltip();
});










