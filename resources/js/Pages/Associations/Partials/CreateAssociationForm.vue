<template>
  <FormKit
    type="text"
    name="name"
    id="name"
    label="Association name"
    validation="required|length:2,100"
  />
    <FormKit
        type="text"
        name="slogan"
        id="slogan"
        label="Association slogan"
        validation="length:2,255|optional"
    />
    <FormKit
        type="file"
        name="image_url"
        id="image_url"
        label="Association image"
        accept=".png,.jpeg,.jpg,.gif,.svg,.webp"
        validation="optional"
        />
</template>
