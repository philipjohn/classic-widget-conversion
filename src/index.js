/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
import { createBlock, registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-registration/
 */
registerBlockType('classic/widget', {
	title: __('Classic Widget'),
	transforms: {
		from: [
			{
				type: 'block',
				blocks: [ 'core/legacy-widget' ],
				isMatch: ({ idBase, instance }) => {
					console.log(idBase)
					console.log(instance)
					if (!instance?.raw) {
						// Can't transform if instance is not shown in the REST API.
						return false;
					}
					return idBase === 'classic_widget'
				},
				transform: ({ instance }) => {
					console.log('transform!');
					return createBlock('classic/widget', {
						name: instance.raw.name
					});
				}
			}
		]
	}
});
