const DOM = function( ){
  this.query = str => document.querySelector(str);
  this.queryAll = str => document.querySelectorAll(str);
  this.create = (tag, attrs = {}) => Object.assign( document.createElement(tag), attrs );
  this.append = (hijo,padre = document.body) => Array.isArray( hijo ) ? hijo.map( h => padre.appendChild(h) ): padre.appendChild(hijo);
}