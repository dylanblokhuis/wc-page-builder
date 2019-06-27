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
@customElement('wc-row')
export class Row extends LitElement {

  /**
   * Create an observed property. Triggers update on change.
   */
  @property()
  foo = 'foowoo';

  static get styles() {
    return css`
      :host { 
        display: flex;
        margin-right: -15px;
        margin-left: -15px;
      }
      
      :host(.wrap) {
        flex-wrap: wrap;
      }`;
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
      <slot></slot>
    `;
  }
}

