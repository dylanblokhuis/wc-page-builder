/**
 * Import LitElement base class, html helper function,
 * and TypeScript decorators
 **/
import {
  LitElement, html, css, customElement, property
} from 'lit-element';

/**
 * Use the customElement decorator to define your class as
 * a custom element. Registers <my-element> as an HTML tag.
 */
@customElement('wc-col')
export class Col extends LitElement {

  @property() width = "100%";

  static get styles() {
    return css`
      :host { 
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
      }
      `;
  } 

  /**
   * Implement `render` to define a template for your element.
   */
  render(){
    /**
     * Use JavaScript expressions to include property values in
     * the element template.
     */
    return html`
      <style>
        :host {
          flex: 0 0 ${this.width};
          max-width: ${this.width};
        }
      </style>
      <slot></slot>
    `;
  }
}

